<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Input;
use App\InputTemplate;
use App\Categorie;
use Auth;
use DB;

class SearchController extends Controller
{
    public function formIndex()
    {
        $forms = Form::join('categories', 'categories.id', '=', 'categorie_id')->select('forms.id', 'forms.form_name', 'forms.form_data', 'categories.name as categorie_name')->orderBy('forms.form_name')->get();
        $categories = Categorie::all();
        return view('forms.list')->with(array('forms' => $forms, 'categories' => $categories, 'categorieOld' => 'Vse', 'searchInputOld' => null));
    }

    public function formSearch(Request $request)
    {
        $forms = Form::join('categories', 'categories.id', '=', 'categorie_id')->select('forms.id', 'forms.form_name', 'forms.form_data', 'categories.name as categorie_name')->orderBy('forms.form_name')->get();

        if($request->categorie != 'Vse')
        {
            $forms = $forms->where('categorie_name', $request->categorie);
        }            
        if($request->searchInput != null)
        {
            $searchString = $request->searchInput;
            $forms = $forms->filter(function ($form) use ($searchString) {
                return str_contains($form->form_name, $searchString);
            });
        }

        $categories = Categorie::all();
        return view('forms.list')->with(array('forms' => $forms, 'categories' => $categories, 'categorieOld' => $request->categorie, 'searchInputOld' => $request->searchInput));
    }

    public function userFormIndex()
    {
        $userId = Auth::id();
        $userForms = Form::where('user_id', $userId)->get();
        return view('userList')->with('forms', $userForms);
    }
}
