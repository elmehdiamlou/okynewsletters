<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/themechoose', function () {
    return view('themechoose');
})->middleware(['auth'])->name('themechoose');

Route::get('/buzzevents', function () {
    return view('buzzevents');
})->middleware(['auth'])->name('buzzevents');

Route::get('/itskills', function () {
    return view('itskills');
})->middleware(['auth'])->name('itskills');

Route::get('/Templateeditor', function () {
    return view('Templateeditor');
})->middleware(['auth'])->name('Templateeditor');

Route::get('/newtemplate', function () {
    return view('newtemplate');
})->middleware(['auth'])->name('newtemplate');


Route::get('/getBuzzeventsTemplates', 'TemplatesController@getBuzzeventsTemplates')->name('getBuzzeventsTemplates');
Route::get('/getITSkillsTemplates', 'TemplatesController@getITSkillsTemplates')->name('getITSkillsTemplates');

Route::get('/getEvents', 'TemplatesController@getEvents')->name('getEvents');
Route::get('/getOffers', 'TemplatesController@getOffers')->name('getOffers');

Route::get('/post', 'PostTemplateController@index')->name('post');
Route::post('/post','PostTemplateController@post');


require __DIR__.'/auth.php';
