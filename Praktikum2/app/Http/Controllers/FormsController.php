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
        $doc = Form::find($id)->form_data;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($doc);   
        $path=$mpdf->Output('filename.pdf', \Mpdf\Output\Destination::STRING_RETURN);
        echo($path);
        return view('forms.form')->with('form', $form)->with('path',$path);
        
    }

    public function formWizard($id)
    {
        $inputs = Form::find($id)->form_input()->get();
        
        $generatedHTMLOutput = "";
        foreach($inputs as $number => $input){
            $idInput = $input->input_template_id;
            $generatedHTMLOutput = $generatedHTMLOutput . $input->label . InputTemplate::find($idInput)->template . " name=\"" .$number. "\" ><br>";
        }

        return view('wizardTemplate')->with('generatedHTMLOutput', $generatedHTMLOutput)->with('form', $id);
    }

    public function formToPDF($id)
    {
        $inputs = Form::find($id)->form_input()->get();
        $generatedHTMLOutput = "";
        $doc = Form::find($id)->form_data;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($doc);
        $mpdf->Output();
    }

    public function formWizardGenerated(Request $request, $id)
    {
        $inputs = Form::find($id)->form_input()->get();
        $form = Form::find($id);

        $data = "";
        foreach($inputs as $number => $input) {
            $data = $data . $input->label . ": " . $request->input($number) . "<br>";
        }
        return view('/output')->with('data', $data)->with('form', $form);
    }

    public function formToDocx($id)
    {
        $generatedHTMLOutput = Form::find($id)->form_data;
        $phpWordDocument = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWordDocument->addSection();
        ob_clean();
        $content = $section->addText($generatedHTMLOutput);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWordDocument, 'Word2007');
        $objWriter->save('Appdividend.docx');
        return response()->download(public_path('Appdividend.docx'));

    }
}
