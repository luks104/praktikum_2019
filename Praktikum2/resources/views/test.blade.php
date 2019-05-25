@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
  <script src={{URL::to('vendor/tinymce/js/tinymce/tinymce.min.js')}}></script>
  <!--Za vsak slučaj, če bo kdaj rabo lahko namesto poti toti link vstavi not 
  "https://cloud.tinymce.com/5/tinymce.min.js?apiKey=u10v0g64egvz9bbbguv1pg14x0au3nus6yzv88vhiwbfwd8"-->

<script>

class Component{
  constructor(position,isSet){
    this.position=position;
    this.isSet = isSet;
  }
  getPosition(){
    return this.position;
  }
  getIsSet(){
    return this.isSet;
  }
}

function findComponent(){
  let currentComponent=0 ;
    for(let i =0;i<components.length;i++){
      if(components[i].isSet === false){
        currentComponent=i;break;
      }
      else {
        currentComponent = components.length;
      }
    }
    return currentComponent;
}
let components = [];


 var editor_config = {
  selector: 'textarea#editor',
  toolbar: 'components | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media| saveComponent',
  plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "emoticons template paste textcolor colorpicker textpattern",
       
      ],
      
  setup: (editor) => {
      
      editor.ui.registry.addMenuButton('components', {
        text: 'Components',
        fetch: function (callback) {
          var menuItems =[
            {
              type: 'menuitem',
              text: 'Komponenta',
              onAction: function(_){
                let tempComp = findComponent();
                components[tempComp] = new Component(tempComp,true);
                console.log(components);
                editor.insertContent("<input data-group='+ group + ' data-label='FOO_label' data-id=" + tempComp +" id='komponenta' type='text' class='form-control komponenta' style='width:15%;height:calc(0.59rem + 2px);padding:.375rem .75rem;font-size:.9rem;line-height:1.6;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;margin-left: .5rem;margin-right:.5rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out' placeholder='Enterlabel'>");
              }
            }
          ];
          callback(menuItems);
        }
      });
      editor.on('DblClick', function(evt) {
      if(evt.target.id == 'komponenta'){
        let id = evt.target.getAttribute("data-id");
        console.log("Removed component: "+id);
        components[id] = new Component(id,false);
        evt.target.remove();

        //evt.target.setAttribute("data-label", evt.target.value);
      }
      
    });
      editor.on('Click', function(evt) {
      if(evt.target.id == 'komponenta'){
        let id = evt.target.getAttribute("data-id");
        console.log("Updated component: "+id +" with label: "+evt.target.value);

        evt.target.setAttribute("data-label", evt.target.value);
      }
      
    });

    }
  };
 
    tinymce.init(editor_config);

    
</script> 
</head>
<body>
  <form method="post" class="form-group">
    <div class="container">

      <textarea id="editor" style="height:30em;"></textarea>
      <br>
      <button type="button" class="btn btn-primary">Primary</button>
      <br><br>
      <div class="row">
          <ul class="list-group">
            <li class="list-group-item">Zgori lahk zberes komponento za dodat</li>
            <li class="list-group-item">En klik na komponento (textbox) shrani tist kar napises kot data-label</li>
            <li class="list-group-item">DVOJNI KLIK na textbox izbrise komponento. NE BRISI Z BACKSPACE-OM</li>
            <li class="list-group-item">Komponente majo svoj data-id da jih lakha js locim</li>
            <li class="list-group-item">F12-> Console izpisuje vn ka se dogaja ko klikas oz. dvojno-klikas</li>
      
      
          </ul>
    
    </div>
  </form>  

</body>
@endsection