<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\simple_html_dom;
use App\Form;
use App\Input;
use App\InputTemplate;
use Auth;
use Mpdf\Mpdf;


class FormsController extends Controller
{
    public function store(Request $request)
    {
        $html = new simple_html_dom();
        $html->load($request->input('formData'));

        $form = new Form;
        $form->form_data = $request->input('formData');
        $form->user_id = Auth::id();
        $form->form_name = $request->input('formName');
        $form->save();

        foreach($html->find('input') as $element){
            $input = new Input;
            $input->label = $element->getAttribute("data-label");
            $input->form_id = $form->id;
            $input->input_template_id = InputTemplate::where('name', $element->getAttribute("data-input-name"))->first()->id;
            $input->save();
        }
        
        return redirect('/')->with('success','Uspešno shranjen obrazec!');
    }

    public function returnForms()
    {
        $forms = Form::orderBy('form_name')->paginate(10);
        return view('forms.list')->with('forms', $forms);
    }

    public function selectForm($id)
    {
        $form = Form::find($id);
        return view('forms.form')->with('form', $form);
    }

    public function formWizard($id)
    {
        $inputs = Form::find($id)->form_input()->get();
        
        $generatedHTMLOutput = "";
        foreach($inputs as $input){
            $idInput = $input->input_template_id;
            $generatedHTMLOutput = $generatedHTMLOutput . $input->label . InputTemplate::find($idInput)->template . "<br>";
        }

        $form = Form::find($id);

        return view('wizardTemplate')->with('generatedHTMLOutput', $generatedHTMLOutput)->with('form', $form);
    }

    public function formToPDF($id)
    {
        $inputs = Form::find($id)->form_input()->get();
        
        $generatedHTMLOutput = "";
        foreach($inputs as $input){
            $idInput = $input->input_template_id;
            $generatedHTMLOutput = $generatedHTMLOutput . $input->label . InputTemplate::find($idInput)->template . "<br>";
        }

        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($generatedHTMLOutput);
        $mpdf->Output();
    }

    public function formWizardGenerated($id)
    {

    }
 
}
