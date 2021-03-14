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
    return view('home', ['title' => 'KEJAKSAAN TINGGI KALIMANTAN SELATAN']);
});

Route::get('/home', function () {
    return view('home2');
});

// Route::get('edulevels','EdulevelController@data');
// Route::get('edulevels/add','EdulevelController@add');
// Route::post('edulevels','EdulevelController@addProcess');
// Route::get('edulevels/edit/{id}','EdulevelController@edit');
// Route::patch('edulevels/{id}', 'EdulevelController@editProcess');
// Route::delete('edulevels/{id}', 'EdulevelController@delete');

// Route::get('programs/trash','ProgramController@trash');
// Route::get('programs/restore/{id?}','ProgramController@restore');
// Route::get('programs/delete/{id?}','ProgramController@delete');
// Route::resource('programs', 'ProgramController');

//Pegawai
Route::get('datapegawai/delete/{id?}', 'PegawaiController@delete');
Route::get('/datapegawai/cetak', 'PegawaiController@cetak')->name('datapegawai/cetak');
Route::get('datapegawai/edit/{id}','PegawaiController@edit');
Route::get('/cetak-filter/{kantor}','PegawaiController@cetakFilter')->name('cetak-filter');
Route::resource('datapegawai', 'PegawaiController');