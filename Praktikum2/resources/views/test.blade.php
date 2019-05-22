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
  toolbar: 'komponenta | ime | priimek |undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | nekaj ',
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
        editor.insertContent("<input id='ena' style='margin-left:5px;margin-right:5px;border-radius:2px;' placeholder='Enterlabel' data-label='nekiLabel' class='komponenta'>");
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

      


      editor.ui.registry.addContextForm('nekaj', {
        
        text: 'nekaj',
        tooltip: 'Insert Current Date',
        id:'neki',
      onAction: function (_) {
        document.getElementById("neki").style.display="none";
        editor.insertContent("<input style='margin-left:5px;margin-right:5px;border-radius:2px;' placeholder='Enterlabel' data-label='nekiLabel' class='do_3' visibility='hidden'>");
      }
      });

      editor.on('click', function(evt) {
          
          if (evt.target.className == 'komponenta') {
        
            
            var x= ocument.getElementsByTagName('label')[0].firstChild.data;

            document.getElementById('maindiv').style.display = 'block';
            document.getElementById("maininput").value ='awfa';
            
          };

          if (evt.target.className == 'ime') {
          var x= 
          document.getElementById('maindiv').style.display = 'block';
          document.getElementById("maininput").value ='awfa';
          
        };

        if (evt.target.className == 'priimek') {
          
    
          var x= 
          document.getElementById('maindiv').style.display = 'block';
          document.getElementById("maininput").value ='awfa';
          
        };
         
          if (evt.target.className == 'test') alert('dafwfwaaw');
          
          if (evt.targer.className== 'button'){
            document.getElementById('main').style.display = 'none';
         
            document.getElementById('ena').value='kul';
            document.getElementById('ena').innerHMTL='GEJ';
          }

          
    
          
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
                <input id='maininput'  placeholder='Enterlabel' data-label='nekiLabel'>
                <button type="button" class='button' onclick="a()">Shrani</button>
              <div>
              </form>
            </div>
    </div>
    
    <script>
    function a(){

      document.getElementById("test").innerHTML = 'kekec';
      document.getElementById('maindiv').style.display = 'none';
    }
    

    </script>
    </body>
    @endsection