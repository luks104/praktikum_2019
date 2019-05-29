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
//Checks if the input has any value. The save component button acts accordingly.
function checkInputName(e){

  if(e.target.value ==='' /* || e.target.value === e.target.name */)
    {
      setDisabled("saveComponent",true);
      
    }
    else{
      setDisabled("saveComponent",false);
    }
}
//Adds component: Input-> Type of input, Type: Text,Password,Email...
function addComponent(editor,input,type){
  let compets = tinymce.activeEditor.dom.select('input.component');
  editor.insertContent("<input data-label='' data-input-name="+input+" name='' id="+compets.length+" type="+type+" class='form-control component'  placeholder='Enter your label...' "+stil+">");
  let compets2 = tinymce.activeEditor.dom.select('input.component');
}
//When user enters an input.
function leaveInput(){
  //document.getElementById("saveComponent").style.visibility = "hidden";
  $("#saveComponent").fadeOut("slow");
  currentComponent=-1;
}
//When user leaves an input.
function enterInput(e){
  
  //document.getElementById("saveComponent").style.visibility = "visible";
  $("#saveComponent").fadeIn("slow");
  currentComponent=e.target.id;
}
//Saves the name of current selected component.
function saveCurrentComp(){
  let v = tinymce.activeEditor.dom.get(currentComponent).value;
  tinymce.activeEditor.dom.setAttribs(currentComponent, {'data-label': v, placeholder: v});
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
  toolbar: 'components | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media| button1',
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
              type: 'menuitem',
              text: 'Component',
              onAction: function(_){
                addComponent(editor,"basicInput2","text");
                //console.log(compets2);
              }
            },

            {
              type: 'menuitem',
              text: 'Ime',
              onAction: function(_){
                addComponent(editor,"ime","text");
                //console.log(compets2);
              }
            },

            {
              type: 'menuitem',
              text: 'Priimek',
              onAction: function(_){
                addComponent(editor,"priimek","text");
                //console.log(compets2);
              }
            },

            {
              type: 'menuitem',
              text: 'Naslov',
              onAction: function(_){
                addComponent(editor,"naslov","text");
                //console.log(compets2);
              }
            },
          ];
          callback(menuItems);
        }
      });
      //Adding click & keyUp events for inputs.
      editor.on('click', function (e) {//Clicking on input selects current component.
        if(e.target.nodeName === 'INPUT'){
          checkInputName(e);
          enterInput(e);
        }
        else{
          leaveInput();
        }
      });
      editor.on('keyup', function (e) {//Writing on input changes its name.
      if(e.target.nodeName === 'INPUT'){
        checkInputName(e);
      }
      else{
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
      <div class="row">
        <div class="col l2 m5 s5">
          <button type="button" id="saveComponent" style="display:none;background-color:#08AEEA" onclick="saveCurrentComp()"  class="waves-effect btn scale-transition">Save component</button>
        </div>
        
        <div class="col l3 offset-l7 right-align m5 offset-m2 s5 offset-s2">
          @guest
          <a  href="{{ route('login') }}" class=" waves-effect waves-light btn-large"style="background-color:#2AF598">Login to save template</a>
          @else
         
          <a class="waves-effect waves btn btn-large modal-trigger scale-transition" id="submitButton"  style="display:none; background-color:#2AF598;" href="#modal1">Save as template</a>
          @endguest
        </div>
      </div>
    </div>

    <div class="modal" id="modal1" tabindex="-1" role="dialog">
        <div class="modal-content">
              <div class="row">
                <div class="col m10 offset-m1">
                        <div class="input-field col s12 animated fadeIn">
                            <input id="nameTemplate" type="text" name="formName">
                             <label for="nameTemplate">Name your template</label>
                             <span class="helper-text">This will help other recognize your template!</span>
                        </div>
                </div>
              </div>
              <div class="row">
                <div class="col m3">
                    <button type="button" class="modal-close btn-large btn-floating hvr-grow waves-effect waves-light red darken-2 animated fadeIn delay-0.5s tooltipped" data-position="right" data-tooltip="Cancel"><i class="large material-icons left">cancel</i></button>
                </div>
                <div class="col m4 offset-m5 right-align">
                    <button type="submit" class="btn-floating hvr-grow btn-large waves-effect waves-light blue animated fadeIn delay-0.5s tooltipped" data-position="left" data-tooltip="Save your template"><i class="large material-icons left">check_circle</i></button>
                </div>
              </div>
            </div>
    </div>
  </form>
  
</body>
@endsection