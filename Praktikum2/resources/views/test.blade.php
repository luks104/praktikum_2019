@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
  <script src={{URL::to('vendor/tinymce/js/tinymce/tinymce.min.js')}}></script>
  <!--Za vsak slučaj, če bo kdaj rabo lahko namesto poti toti link vstavi not 
  "https://cloud.tinymce.com/5/tinymce.min.js?apiKey=u10v0g64egvz9bbbguv1pg14x0au3nus6yzv88vhiwbfwd8"-->

<script>

tinymce.PluginManager.add('sample', function(ed, url) {

var me=this, dynamicallyEditable;




 me.refresh = function() {
     if(dynamicallyEditable.dynamicallyAdded){
       dynamicallyEditable.dynamicallyAdded.remove();
       dynamicallyEditable.dynamicallyAdded = null;
     }

     dynamicallyEditable.settings.values = dynamicallyEditable.settings.dynamicallyAdded = getValues();
 };

 
});

  
 var editor_config = {


  

  selector: 'textarea#editor',
  toolbar: 'komponenta | ime | priimek |undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | input',
  plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "emoticons template paste textcolor colorpicker textpattern",
       
      ],
      
  setup: (editor) => {
      editor.ui.registry.addButton('komponenta', {
        text: 'Komponenta',
        tooltip: 'Insert Current Date',
        
      onAction: function (_) {
        
        editor.insertContent("<input id='ena' style='margin-left:5px;margin-right:5px;border-radius:2px;' placeholder='Enterlabel' data-label='a' class='komponenta'>");
        
      }
      });

     

      editor.ui.registry.addButton('ime', {
        text: 'ime',
        tooltip: 'Vpisite svoje ime',
      onAction: function (_) {
        editor.insertContent("<input id='ime' style='margin-left:5px;margin-right:5px;border-radius:2px;' placeholder='ime' data-label='nekiLabel' class='ime'>");
      }
      });

      editor.ui.registry.addButton('priimek', {
        text: 'priimek',
        tooltip: 'Vpisite svoj priimek',
      onAction: function (_) {
        editor.insertContent("<input id='priimek' style='margin-left:5px;margin-right:5px;border-radius:2px;' placeholder='priimek' data-label='nekiLabel' class='priimek'>");
      }
      });

      

   

      editor.on('click', function(evt) {
         var id=null;
         var clas;

          if (evt.target.className == 'komponenta') {

            id=tinyMCE.activeEditor.dom.get("ena").getAttribute("id");
            data=tinyMCE.activeEditor.dom.get("ena").getAttribute("data-label");

           
            document.getElementById("hiddeninput").value =id;
            document.getElementById("maininput").value =data;
            document.getElementById('maindiv').style.display = 'block';
         
          
      
            
          };

          if (evt.target.className == 'ime') {
        
          
          id=tinyMCE.activeEditor.dom.get("ime").getAttribute("id");
          data=tinyMCE.activeEditor.dom.get("ime").getAttribute("data-label");
          document.getElementById("hiddeninput").value =id;
          document.getElementById("maininput").value =data;
          document.getElementById('maindiv').style.display = 'block';
          
        };

        if (evt.target.className == 'priimek') {
          
    
          id=tinyMCE.activeEditor.dom.get("priimek").getAttribute("id");
          data=tinyMCE.activeEditor.dom.get("priimek").getAttribute("data-label");
          document.getElementById("hiddeninput").value =id;
          document.getElementById("maininput").value =data;
          document.getElementById('maindiv').style.display = 'block';
       
          
        };
         
          
          
         

          
    
          
      });


      

    }
    
  };

 
    tinymce.init(editor_config);

    
  </script> 
  </head>
    <body>
    <div class="row">
            <div class="col-lg-2">

            </div>
            
            <div class="col-lg-8">
            <form method="post" class="form-group">
                <textarea id="editor" style="height:30em;">
              
                <!--
                <p onclick="customMethod();" class="do_1">Call custom method.</p>
                <p onclick="alert('alert called');" class="do_3" >Call Alert.</p>
                <p class="test" onclick="myFunction()">Click me to change my HTML content (innerHTML).</p>
                <p class="demo" onclick="myFunction()">Click me to change my HTML content (innerHTML).</p>-->
                </textarea>
                
                <button type="button" class="btn btn-primary" onclick="a()">Primary</button>
            </form>
        
            </div>
            <div class="col-lg-2">
              <form>
              <p id='test'>test</p>

              <div id='maindiv' style="display:none">
              <div class="col-10">
   
    
              <input id='hiddeninput' type='hidden'>
                <button type="button" class="btn btn-success" onclick="b()">poisci element</button><br></br>
                  <div id='isci' style="display:none">
                    <input id='maininput'  placeholder='Enterlabel' data-label='nekiLabel' class='form-control '>
                    <button type="button" class="btn btn-success" onclick="a()">Shrani labelo</button>
                  </div>
                </div>
                <div class="col-2">
                </div>
              <div>
              </form>
            </div>
    </div>
    
    <script>

    var id;
    function b(){

          id=document.getElementById('hiddeninput').value;
      
          alert(id);
        
          
          document.getElementById('isci').style.display = 'block';
          
    }

    function a(){

     var labela=document.getElementById('maininput').value;
     
     tinyMCE.activeEditor.dom.get(id).setAttribute("data-label", labela);
     document.getElementById('maindiv').style.display = 'none';
      
    }




  

    

    </script>
    </body>
    @endsection