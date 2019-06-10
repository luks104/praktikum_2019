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
use Html2text\html2text;
use Mail;
use App\User;


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
        $form->form_description = $request->input('formDescription');
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
        /*
        foreach($inputs as $number => $input) {
            $data = $data . $input->label . ":" . $request->input($number) . "<br>";
        }
        */
        $collection = [];
        foreach($inputs as $number => $input) {
          
            array_push($collection, $input->label);
        }
        //return $collection;
        
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($document);   
        $path=$mpdf->Output('filename.pdf', \Mpdf\Output\Destination::STRING_RETURN);
      
        $encodedPDF = chunk_split(base64_encode($path));
        
        return view('forms.form')->with('form', $form)->with('encodedPDF',$encodedPDF)->with('data',$collection);
        
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


    public function formWizardGenerated(Request $request, $id)
    {
       
        $inputs = Form::find($id)->form_input()->get();
        $form = Form::find($id);

        $formBlank= $form->form_data;
        $document = new simple_html_dom();
        $document->load($formBlank);
      
        foreach($inputs as $number => $input) {
    
            $document->find('input', $number)->outertext=' '.$request->input($number).' ';
        }
        return view('/output')->with('form', $form)->with('document', $document);
    }

    //PDF in DOCX
    public function formToPDF(Request $request, $id)
    {
     
        $form = Form::find($id);
        $document2 = $request->input('document');
        $document = (string)$document2;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($document);   
        $path=$mpdf->Output($form->form_name.'.pdf', \Mpdf\Output\Destination::DOWNLOAD);  
     
    }


    public function formToOdf(Request $request,$id)
    {

        $form = Form::find($id);
        $filename=$form->form_name.'.odt';
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $document2 = $request->input('document');

        //Necessary headers
        header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessing‌​ml.document" );
        header( 'Content-Disposition: attachment; filename='.$filename );
        $h2d_file_uri = tempnam( "", "htd" );

        
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $document2, false, false);
        ob_clean();
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
        $objWriter->save( "php://output" );
    
        exit;

    }


    public function formToDocx(Request $request,$id)
    {

        $form = Form::find($id);
        $filename=$form->form_name.'.docx';
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $document2 = $request->input('document');

        //Necessary headers
        header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessing‌​ml.document" );
        header( 'Content-Disposition: attachment; filename='.$filename );
        $h2d_file_uri = tempnam( "", "htd" );

        
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $document2, false, false);
        ob_clean();
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save( "php://output" );
    
        exit;

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
        $form->form_description = $request->input('formDescription');
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
        
        return redirect('form')->with('success','Successfully updated template!');
    }

    public function formDelete(Request $request, $id)
    {
        $form = Form::find($id);
        $inputs = $form->form_input()->get();
        $form->delete();

        foreach($inputs as $input){
            $input->delete();
        }
        
        return redirect('form')->with('success', 'Successfully deleted template');
    }





    //Mail
    public function returnViewMail(Request $request, $id)
    {   
        $form = Form::find($id);
        $document = $request->input('document');
        return view('sendMail')->with('document', $document)->with('form', $form);
    }

    
    public function sendOnMyMail(Request $request, $id){
        $form = Form::find($id);
        $recipient=User::find(Auth::id())->email;
        $documentName=$form->form_name;
        $documentRaw = $request->input('document');
        $document = (string)$documentRaw;   
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($document);    
        $path=$mpdf->Output($form->form_name.'.pdf', \Mpdf\Output\Destination::STRING_RETURN);
        $path2=base64_encode($path);

        $data=array(
            'email'=>'smartformsinfo@gmail.com',
            'subject'=>'Requested form',
            'bodyMessage'=>'This is the form that you have requested to be sent on your mail address',
            'documentName'=>$documentName,
            'path2'=>$path2,
            'recipient'=>$recipient,
        );

    
        Mail::send('other.email',$data,function($message) use ($data){
            $message->from($data['email']);
            $message->to($data['recipient']);
            $message->subject($data['subject']);
            $message->attachData(base64_decode($data['path2']), ($data['documentName']).'.pdf');
        });

        return view('/output')->with('form', $form)->with('document', $document);
        
    }
    public function sendMail(Request $request, $id){

        
        $form = Form::find($id);
        $sender=User::find(Auth::id())->name;
        $documentName=$form->form_name;
        $documentRaw = $request->input('test');
        $documentTrimmed = substr($documentRaw, 1, -1);
        $document = (string)$documentTrimmed;
   
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($document);   
        $PDFstring=$mpdf->Output($form->form_name.'.pdf', \Mpdf\Output\Destination::STRING_RETURN);
        $encodedPDF=base64_encode($PDFstring);
        $lulek=base64_decode($encodedPDF);
        
        $data=array(
            'receiptant'=>$request->receiptant,
            'email'=>'smartformsinfo@gmail.com',
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message. 'This form was sent to you by '.$sender,
            'documentName'=>$documentName,
            'file'=>$encodedPDF,
        );

        Mail::send('other.email',$data,function($message) use ($data)
        {
            $message->from($data['email']);
            $message->to($data['receiptant']);
            $message->subject($data['subject']);
            $message->attachData(base64_decode($data['file']), ($data['documentName']).'.pdf');
               
           
            
        });
        
        return view('/output')->with('form', $form)->with('document', $document);
    }
}
