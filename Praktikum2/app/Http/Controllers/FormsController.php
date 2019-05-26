<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\simple_html_dom;
use App\Form;
use App\Input;
use Auth;

class FormsController extends Controller
{
    public function store(Request $request)
    {
        $html = new simple_html_dom();
        $html->load($request->input('formData'));

        $form = new Form;
        $form->form_data = $request->input('formData');
        $form->user_id = Auth::id();
        $form->save();

        foreach($html->find('input') as $element){
            $input = new Input;
            $input->label = $element->getAttribute("name");
            $input->form_id = $form->id;
            $input->input_type_id=1;
            $input->save();
        }
        return redirect('/home');
    }
}
