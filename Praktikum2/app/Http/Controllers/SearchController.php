<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Input;
use App\InputTemplate;
use App\Categorie;
use Auth;

class SearchController extends Controller
{
    public function formIndex()
    {
        $forms = Form::orderBy('form_name')->paginate(10);
        $categories = Categorie::all();
        return view('forms.list')->with(array('forms' => $forms, 'categories' => $categories, 'categorieOld' => 'Vse'));
    }

    public function formSearch(Request $request)
    {
        if($request->categorie == 'Vse')
        {
            $forms = Form::orderBy('form_name')->paginate(10);
        }
        else
        {
            $categorieId = Categorie::where('name', $request->categorie)->first()->id;
            $forms = Form::where('categorie_id', $categorieId)->orderBy('form_name')->paginate(10);
        }            
        
        $categories = Categorie::all();
        return view('forms.list')->with(array('forms' => $forms, 'categories' => $categories, 'categorieOld' => $request->categorie));
    }
}
