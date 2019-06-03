<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\simple_html_dom;
use App\Form;
use App\Input;
use App\InputTemplate;
use App\Categorie;
use Auth;
use Mpdf\Mpdf;


class FormsController extends Controller
{
    public function openEditor()
    {
        $categories = Categorie::all();
        return view("forms.create")->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $html = new simple_html_dom();
        $html->load($request->input('formData'));

        $form = new Form;
        $form->form_data = $request->input('formData');
        $form->user_id = Auth::id();
        $form->form_name = $request->input('formName');
        $form->categorie_id = Categorie::where('name', $request->input('categorie'))->first()->id;
        $form->save();

        foreach($html->find('input') as $element){
            $input = new Input;
            $input->label = $element->getAttribute("data-label");
            $input->form_id = $form->id;
            $input->input_template_id = InputTemplate::where('name', $element->getAttribute("data-input-name"))->first()->id;
            $input->save();
        }
        
        return redirect('/form')->with('success','Successfully save template!');
    }

    public function selectForm(Request $request, $id)
    {
      
        $form = Form::find($id);
        $document = Form::find($id)->form_data;
        $inputs = Form::find($id)->form_input()->get();

        $data = "";
        foreach($inputs as $number => $input) {
            $data = $data . $input->label . ":" . $request->input($number) . "<br>";
        }

        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($document);   
        $path=$mpdf->Output('filename.pdf', \Mpdf\Output\Destination::STRING_RETURN);
      
        $encodedPDF = chunk_split(base64_encode($path));
        //echo($encodedPDF);
        return view('forms.form')->with('form', $form)->with('encodedPDF',$encodedPDF)->with('data',$data);
        
    }

    public function formWizard($id)
    {
        $inputs = Form::find($id)->form_input()->get();
        
    
        $generatedHTMLOutput = "";        
        foreach($inputs as $counter => $input){
            $inputTemplate = new simple_html_dom();
            $idInput = $input->input_template_id;
            $inputTemplate->load(InputTemplate::find($idInput)->template);
            if($inputer = $inputTemplate->find('input', 0)) {
                $inputTemplate->find('input', 0)->name = $counter;
            }

            if($select = $inputTemplate->find('select', 0)) {
                $inputTemplate->find('select', 0)->name = $counter;
            }

            $generatedHTMLOutput = $generatedHTMLOutput . $input->label . $inputTemplate . "<br>";
        }

        return view('wizardTemplate')->with('generatedHTMLOutput', $generatedHTMLOutput)->with('form', $id);
    }

    public function formToPDF($id)
    {
         
        $form = Form::find($id);
       
        $document = $form->form_data;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($document);   
        $path=$mpdf->Output('filename.pdf', \Mpdf\Output\Destination::DOWNLOAD);
/*
        $inputs = Form::find($id)->form_input()->get();
        $generatedHTMLOutput = "";
        $doc = Form::find($id)->form_data;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($doc);
        $mpdf->Output();*/
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

    public function formEdit(Request $request, $id)
    {
        $form = Form::find($id);
        if(Auth::id() !== $form->user_id){
            return redirect('/')->with('error', 'Nedovoljeno urejanje!');
        }
        else {
            $categories = Categorie::all();
            return view('forms.edit')->with('form', $form)->with('categories', $categories)->with('form', $form);
        }
    }

    public function formUpdate(Request $request, $id)
    {
        $html = new simple_html_dom();
        $html->load($request->input('formData'));

        $form = Form::find($id);
        $form->form_data = $request->input('formData');
        $form->form_name = $request->input('formName');
        $form->categorie_id = Categorie::where('name', $request->input('categorie'))->first()->id;
        $form->save();

        $inputs = $form->form_input()->get();
        foreach($inputs as $input){
            $input->delete();
        }

        foreach($html->find('input') as $element){
            $input = new Input;
            $input->label = $element->getAttribute("data-label");
            $input->form_id = $form->id;
            $input->input_template_id = InputTemplate::where('name', $element->getAttribute("data-input-name"))->first()->id;
            $input->save();
        }

        $userId = Auth::id();
        $userForms = Form::where('user_id', $userId)->get();
        
        return view('/userList')->with('forms', $userForms)->with('success','Successfully updated template!');
    }

    public function formDelete(Request $request, $id)
    {
        $form = Form::find($id);
        $inputs = $form->form_input()->get();
        $form->delete();

        foreach($inputs as $input){
            $input->delete();
        }

        $userId = Auth::id();
        $userForms = Form::where('user_id', $userId)->get();

        return view('userList')->with('forms', $userForms)->with('success', 'Successfully deleted template');
    }
}
