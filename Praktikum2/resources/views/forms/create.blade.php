@extends('layouts.mainLayout')

@section('content')
<!doctype html>
<html lang="en">
  <head>
  <script src={{URL::to('vendor/tinymce/js/tinymce/tinymce.min.js')}}></script>
  <script src={{URL::to('vendor/parsley/parsley.min.js')}}></script>
  <!--Za vsak slučaj, če bo kdaj rabo lahko namesto poti toti link vstavi not 
  "https://cloud.tinymce.com/5/tinymce.min.js?apiKey=u10v0g64egvz9bbbguv1pg14x0au3nus6yzv88vhiwbfwd8"-->

<script>
let currentComponent= -1;
let stil = "style='width:15%;height:calc(0.59rem + 2px);padding:.375rem .75rem;font-size:.9rem;line-height:1.6;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;margin-left: .5rem;margin-right:.5rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out'"
//Enables/Disables button depending on condition.
function setDisabled(button,disabled){
  if(disabled){
      document.getElementById(button).classList.add("disabled");
      document.getElementById(button).setAttribute("disabled",true);
  }
  else{
      document.getElementById(button).classList.remove("disabled");
      document.getElementById(button).removeAttribute("disabled");
  }
}

//Adds component: Input-> Type of input, Type: Text,Password,Email...
function addComponent(editor,input,type){
  let compets = tinymce.activeEditor.dom.select('input.component');
  editor.insertContent("<input data-label='' data-input-name="+input+" name=a'' readonly id="+compets.length+" type="+type+" class='form-control component'  placeholder='' "+stil+" readonly>");
  let compets2 = tinymce.activeEditor.dom.select('input.component');
}
//When user enters an input.
function leaveInput(){
  //document.getElementById("saveComponent").style.visibility = "hidden";
  $("#saveComponent").fadeOut("");
  $("#nameInput").fadeOut("");
  currentComponent=-1;
}
//When user leaves an input.
function enterInput(e){
  
  //document.getElementById("saveComponent").style.visibility = "visible";
  $("#saveComponent").fadeIn("");
  $("#nameInput").fadeIn("");
  currentComponent=e.target.id;
}
//Saves the name of current selected component.
function saveCurrentComp(){
  let v = $('#componentName').val();
  tinymce.activeEditor.dom.setAttribs(currentComponent, {'data-label': v, placeholder: v});
  $('#componentName').val("");
  leaveInput();
  checkContent();
}
//Enables sumbit button if enable = true;
function enableSumbit(enable){
  if(!enable){
    $("#submitButton").fadeOut();
    //setDisabled("submitButton",true);
  }
  else{
    $("#submitButton").fadeIn();
    //setDisabled("submitButton",false);
  }
  
}

//Checks if all components are named.
function checkContent(){
  let comps = tinymce.activeEditor.dom.select('input.component');
  let found = false;
  
  if(comps.length === 0){
    
    if(tinymce.activeEditor.getContent()===''){
      enableSumbit(false);
    }
    else{
      enableSumbit(true);
    }
  }
  else{
    for(let y =0;y<comps.length;y++){
      if(tinymce.activeEditor.dom.getAttrib(comps[y], 'data-label')=== ''){
        found=true; break;
      }
    }
    if(found){
      enableSumbit(false);
    }
    else{
      enableSumbit(true);
    }
  }
 
}
 var editor_config = {
  selector: 'textarea#editor',
  toolbar: ' components | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
  plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "emoticons template paste textcolor colorpicker textpattern",
      ],
  setup: (editor) => 
    {
      //Adding components
      editor.ui.registry.addMenuButton('components', {
        text: 'Components',
        fetch: function (callback) {
          var menuItems =[
            {
            type: 'nestedmenuitem',
            text: 'Personal data',
            getSubmenuItems: function () {
              return [
                {
                  type: 'menuitem',
                  text: 'Name',
                  onAction: function(_){
                  addComponent(editor,"uppercaseInitial","text");
                  }
                },

                {
                  type: 'menuitem',
                  text: 'Surame',
                  onAction: function(_){
                  addComponent(editor,"uppercaseInitial","text");
                  }
                },

                {
                  type: 'menuitem',
                  text: 'Date of birth',
                  onAction: function(_){
                  addComponent(editor,"date","text");
                  }
                },

                {
                  type: 'menuitem',
                  text: 'Addres',
                  onAction: function(_){
                  addComponent(editor,"required","text");
                  }
                },

                {
                  type: 'menuitem',
                  text: 'EMSO',
                  onAction: function(_){
                  addComponent(editor,"emso","text");
                  }
                },
              ];
            }
          },

          {
            type: 'nestedmenuitem',
            text: 'Car data',
            getSubmenuItems: function () {
              return [
                {
                  type: 'menuitem',
                  text: 'Registration Plate',
                  onAction: function(_){
                  addComponent(editor,"registrationPlate","text");
                  }
                },

                {
                  type: 'menuitem',
                  text: 'Vin',
                  onAction: function(_){
                  addComponent(editor,"vin","text");
                  }
                },
              ];
            }
          },
          ];
          callback(menuItems);
        }
      });
      //Adding click & keyUp events for inputs.
      editor.on('click', function (e) {//Clicking on input selects current component.
        if(e.target.nodeName === 'INPUT'){
          checkInputName();
          enterInput(e);
        }
        else{
          leaveInput();
        }
      });
      editor.on('keyup', function (e) {//Writing on input changes its name.
      if(e.target.nodeName !== 'INPUT'){
        leaveInput();
      }
      }); 
      editor.on('nodechange',function(e){
        checkContent();
      })
    }
  };
 
tinymce.init(editor_config);

</script> 
</head>
<body>
<form action="{{ route('formStore') }}" method="POST" type="hidden" name="_token" class="form-group"  enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="container animated fadeInUp section">
      <textarea id="editor" style="height:30em;" name="formData" class=""></textarea>
      <br>
      <div class="row" style="min-height:8em;">
        <div class="col l6 m6 s10 offset-s1">
          <div class="input-field" id="nameInput" style="display:none;">
            <input id="componentName" type="text" name="">
             <label for="componentName">Name your component</label>
             <span class="helper-text red-text" style="display:none;" id="nameHelp"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col l3 m5 s5 left-align">
          <button type="button" id="saveComponent" style="display:none;" onclick="saveCurrentComp()"  class="waves-effect btn btn-large scale-transition bgStill">Save component</button>
        </div>
        <div class="col l3 offset-l6 right-align m4 offset-m3 s5 offset-s2">
          @guest
          <a  href="{{ route('login') }}" class=" waves-effect waves-light btn-large bgStill">Login to save template</a>
          @else
         
          <a class="waves-effect waves btn btn-large modal-trigger scale-transition bgStill" id="submitButton"  style="display:none;" href="#modal1">Save as template</a>
          @endguest
        </div>
      </div>
    </div>
    
    <div class="modal col l12 s12 m12" id="modal1" tabindex="-1" role="dialog" >
        <div class="modal-content">
              <div class="row">
                <div class="col m10 offset-m1 s10 offset-s1">
                        <div class="input-field col s12 animated fadeIn">
                            <input id="nameTemplate" type="text" name="formName">
                             <label for="nameTemplate">Name your template</label>
                             <span class="helper-text">This will help other recognize your template</span>
                        </div>
                </div>
              </div>
              <div class="row">
                <div class="col l10 offset-l1 m12 s10 offset-s1">
                        <div class="input-field col s12 animated fadeIn">
                            <div class="input-field col s12 ">
                              <textarea id="form_description" class="materialize-textarea" name="formDescription"></textarea>
                              <label for="form_description">Description</label>
                              <span class="helper-text">This will help understanding your template</span>
                            </div>
                        </div>
                </div>
              </div>
              <div class="row">
                  <div class="input-field col s10 l10 offset-l1 s10 offset-s1">
                      <select name="categorie">
                        @foreach($categories as $categorie)
                          <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                        @endforeach
                      </select>
                      <label>Choose your category</label>
                    </div>
                </div>
              <div class="row">
                <div class="col l10 offset-l1 m10 offset-m1 s10 offset-s1">
                  <button type="submit" class="modal-close btn-large waves-effect waves-light darken-2 animated fadeIn delay-0.5s bgStill" style="width:100%" >Create template</button>
                </div>
              </div>

              <div class="row">
                <div class="col l10 offset-l1 m10 offset-m1 s10 offset-s1">
                  <button type="button" class="modal-close btn waves-effect waves-light darken-2 animated fadeIn delay-1s" style="background-color:#a4a5a8;width:100%" >Cancel</button>
                </div>
              </div>
      </div>
    </div>
  </form>
  <script> 
  //KeyUp for input
$('#componentName').keyup(function() {
    checkInputName();
});
//Checks if the input has any value. The save component button acts accordingly.
function checkInputName(){
  var value = $('#componentName').val();
  var editorComponent = tinymce.activeEditor.dom.getAttrib(currentComponent, 'data-label');
  if(value ==='' || value===editorComponent)
    {
      if(value===editorComponent &&  editorComponent !== ''){
        $("#nameHelp").text("Name is already set!")
        $("#nameHelp").fadeIn("");
      }
      if(value===''){
        $("#nameHelp").text("Name can not be unset!")
      }
      setDisabled("saveComponent",true);
      
    }
    else{
      setDisabled("saveComponent",false);
      $("#nameHelp").fadeOut("");
    }
}
  </script>
@endsection