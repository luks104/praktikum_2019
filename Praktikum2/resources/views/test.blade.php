@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
  <script src={{URL::to('vendor/tinymce/js/tinymce/tinymce.min.js')}}></script>
  <!--Za vsak slučaj, če bo kdaj rabo lahko namesto poti toti link vstavi not 
  "https://cloud.tinymce.com/5/tinymce.min.js?apiKey=u10v0g64egvz9bbbguv1pg14x0au3nus6yzv88vhiwbfwd8"-->

<script>

let currentComponent= -1;
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

  if(e.target.value ==='' || e.target.value === e.target.name)
    {
      setDisabled("saveComponent",true);
      
    }
    else{
      setDisabled("saveComponent",false);
    }
}
//When user enters an input.
function leaveInput(){
  document.getElementById("saveComponent").style.visibility = "hidden";
  currentComponent=-1;
}
//When user leaves an input.
function enterInput(e){
  
  document.getElementById("saveComponent").style.visibility = "visible";
  currentComponent=e.target.id;
}
//Saves the name of current selected component.
function saveCurrentComp(){
  let v = tinymce.activeEditor.dom.get(currentComponent).value;
  tinymce.activeEditor.dom.setAttribs(currentComponent, {'name': v, placeholder: v});
  leaveInput();
  checkContent();
}
//Enables sumbit button if enable = true;
function enableSumbit(enable){
  if(!enable){
    setDisabled("submitButton",true);
  }
  else{
    setDisabled("submitButton",false);
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
      if(tinymce.activeEditor.dom.getAttrib(comps[y], 'name')=== ''){
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
                let compets = tinymce.activeEditor.dom.select('input.component');
                editor.insertContent("<input  name='' id="+compets.length+" type='text' class='form-control component' style='width:15%;height:calc(0.59rem + 2px);padding:.375rem .75rem;font-size:.9rem;line-height:1.6;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;margin-left: .5rem;margin-right:.5rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out' placeholder='Enter your label...'>");
                let compets2 = tinymce.activeEditor.dom.select('input.component');
                //console.log(compets2);
              }
            }
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
<form action="{{ route('formStore') }}" method="POST" type="hidden" name="_token" class="form-group" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="container">
      <textarea id="editor" style="height:30em;" name="formData"></textarea>
      <br>
      <div class="row">
        <div class="col-lg-2">
          <button type="button" id="saveComponent" onclick="saveCurrentComp()" style="visibility: hidden;" class="btn btn-success btn-block">Save component</button>
        </div>
        
        <div class="col-lg-3 offset-lg-7">
          <button type="submit" id="submitButton" disabled  class="disabled btn btn-primary btn-block">Save as template</button>
        </div>
      </div>
    </div>
  </form>  

</body>
@endsection