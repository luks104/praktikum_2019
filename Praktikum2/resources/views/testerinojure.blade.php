@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
  <script src={{URL::to('vendor/tinymce/js/tinymce/tinymce.min.js')}}></script>
  <!--Za vsak slučaj, če bo kdaj rabo lahko namesto poti toti link vstavi not 
  "https://cloud.tinymce.com/5/tinymce.min.js?apiKey=u10v0g64egvz9bbbguv1pg14x0au3nus6yzv88vhiwbfwd8"-->

  <script type="text/javascript">

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

tinymce.init({
  selector: "textarea",
  plugins: [
    
  ],
  toolbar: "my_listbox refresh",
  myKeyValueList : [
          {text: 'Menu item 1', value: 'Some text 1'},
          {text: 'Menu item 2', value: 'Some text 2'},
          {text: 'Menu item 3', value: 'Some text 3'}
  ],
  setup : function(ed) {
      // Display an alert onclick
      ed.on('click', function(evt) {
          console.log('User clicked the editor. Element:', evt.target);
          if (evt.target.className == 'do_1') alert('do_1');
          if (evt.target.className == 'do_2') alert('do_2');
      });
  }
  

});
</script>



  
  </head>
    <body>
    <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
            <form method="post" class="form-group">
                <textarea id="editor" style="height:30em;">
                <p onclick="customMethod();" class="do_1">Call custom method.</p>
                <p onclick="alert('alert called');" class="do_2" >Call Alert.</p>
                
                </textarea>
                <button type="button" class="btn btn-primary" onclick="display()">Primary</button>
                <h1 id="demo"></h1>
            </form>
            <input readonly style='margin-left:5px;margin-right:5px;border-radius:2px;' placeholder='Enterlabel' data-label='nekiLabel' onclick='display()'>
      
            </div>
            <div class="col-lg-2">

            
            </div>
    </div>
    
    
    </body>
    @endsection