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

Route::get('/create', 'FormsController@openEditor')->name('formCreate');

Route::get('/wizardtemplate', function () {
    return view('wizardtemplate');
});

Route::post('/create', 'FormsController@store')->name('formStore');

Route::get('/form/{id}', 'FormsController@selectForm')->name('formDetail');

Route::get('/form/{id}/wizard', 'FormsController@formWizard')->name('formWizard');

Route::post('/form/{id}/wizard', 'FormsController@formWizardGenerated')->name('formWizardGenerated');

Route::get('/form', 'SearchController@formIndex')->name('formIndex');

Route::post('/form', 'SearchController@formSearch')->name('formSearch');

Route::get('/output', function (){
    return view('output');
})->name('output');

Route::get('/form/{id}/wizard/formToPDF', 'FormsController@formToPDF')->name('formToPDF');

Route::get('/form/{id}/formToDocx', 'FormsController@formToDocx')->name('formToDocx');

Route::get('/myForm', 'SearchController@userFormIndex')->name('userFormIndex');

Route::get('/myForm/{id}/edit', 'FormsController@formEdit')->name('userFormEdit');

Route::post('/myForm/{id}/edit', 'FormsController@formUpdate')->name('userFormUpdate');

Route::get('/myForm/{id}/delete', 'FormsController@formDelete')->name('userFormDelete');

Route::get('/user', 'UserController@userIndex')->name('userIndex');

Route::post('/userEmail', 'UserController@userEditEmail')->name('emailEdit');

Route::post('/userName', 'UserController@userEditName')->name('usernameEdit');

Route::post('/userPassword', 'UserController@userEditPassword')->name('passwordEdit');

Route::get('/form/{id}/mail/sendOnMyMail','FormsController@sendOnMyMail')->name('sendOnMyMail');

Route::get('/form/{id}/wizard/mail', 'FormsController@returnViewMail')->name('viewMail');

Route::post('/form/{id}/wizard/mail/sent', 'FormsController@sendMail')->name('sendMail');