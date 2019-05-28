<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/create', function () {
    return view('create');
})->name('formCreate');

Route::get('/wizardtemplate', function () {
    return view('wizardtemplate');
});

Route::post('/create', 'FormsController@store')->name('formStore');

Route::get('/form', 'FormsController@returnForms')->name('formList');

Route::get('/form/{id}', 'FormsController@selectForm')->name('formDetail');

Route::get('/form/{id}/wizard', 'FormsController@formWizard')->name('formWizard');