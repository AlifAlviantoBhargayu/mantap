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
    return view('home');
});
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');


Route::group(['middleware' => ['auth','checkRole:admin']],function (){
Route::post('/jadwal/create','JadwalController@create')->middleware('auth');
Route::get('/jadwal/{id}/delete','JadwalController@delete')->middleware('auth');
Route::post('/jadwal/{id}/update','JadwalController@update')->middleware('auth');
Route::get('/jadwal/{id}/edit','JadwalController@edit')->middleware('auth');
Route::post('/murid/create', 'MuridController@create')->middleware('auth');
Route::get('/murid/{id}/edit', 'MuridController@edit')->middleware('auth');
Route::post('/murid/{id}/update', 'MuridController@update')->middleware('auth');
Route::get('/murid/{id}/delete', 'MuridController@delete')->middleware('auth');
Route::get('/murid/{id}/profile','MuridController@profile')->middleware('auth');
Route::post('/murid/{id}/addnilai','MuridController@addnilai')->middleware('auth');
Route::post('/murid/{id}/addnilai2','MuridController@addnilai')->middleware('auth');
Route::post('/murid/{id}/addnilai3','MuridController@addnilai')->middleware('auth');
Route::post('/murid/{id}/addnilai4','MuridController@addnilai')->middleware('auth');
Route::post('/murid/{id}/addnilai5','MuridController@addnilai')->middleware('auth');
Route::post('/murid/{id}/addnilai6','MuridController@addnilai')->middleware('auth');
Route::post('/murid/{id}/addnilai7','MuridController@addnilai')->middleware('auth');
Route::get('/whatsapp','WhatsappController@index')->middleware('auth');
Route::get('/murid/{id}/{idreport}/deletehasil','MuridController@deletehasil');
Route::get('/murid/{id}/{idreport2}/deletehasil2','MuridController@deletehasil2');
Route::get('/murid/{id}/{idreport3}/deletehasil3','MuridController@deletehasil3');
Route::get('/murid/{id}/{idreport4}/deletehasil4','MuridController@deletehasil4');
Route::get('/murid/{id}/{idreport5}/deletehasil5','MuridController@deletehasil5');
Route::get('/murid/{id}/{idreport6}/deletehasil6','MuridController@deletehasil6');
Route::get('/murid/{id}/{idreport7}/deletehasil7','MuridController@deletehasil7');
Route::get('/muridreport/export','MuridController@export');
Route::get('/bunda/{id}/profile','BundaController@profile');
Route::get('/bunda/{id}/edit', 'BundaController@edit')->middleware('auth');
Route::post('/bunda/{id}/update', 'BundaController@update')->middleware('auth');
Route::get('/ijasah/{id}/cetak','IjasahController@cetak');
Route::get('/jadwalsiswa/{id}/profile','JadwalSiswaController@profile')->middleware('auth');
Route::get('/smart','SmartController@index')->middleware('auth');
Route::post('/kriteria/create', 'SmartController@create')->middleware('auth');


// penilaian
Route::get('/penelaian/index', 'KriteriaController@index')->name('kriteria.index');
Route::post('/penelaian/store', 'KriteriaController@store')->name('kriteria.store');
Route::get('/penelitian/edit/{id}', 'KriteriaController@edit')->name('kriteria.edit');
Route::put('/penelitian/update/{id}', 'KriteriaController@update')->name('kriteria.update');
Route::get('/penelaian/destroy/{id}', 'KriteriaController@destroy')->name('kriteria.destroy');
// nilai relatif

     //   //whatsapp
     //   $nama=$_POST['nama'];
     //   $pesan=$_POST['pesan'];
      //  $noWA=$_POST['nowa'];


      //  return redirect('https://api.whatsapp.com/send?phone=62'.$noWA.'&text=Assamulaikum%2C%20'.$nama.'%20Bayaran%20Sudah%20Jatuh%20Tempo%20Ya%20'.$pesan.'');



});


Route::group(['middleware' => ['auth','checkRole:admin,murid']],function () {
    Route::get('/jadwal','JadwalController@index')->middleware('auth');
    Route::get('/murid', 'MuridController@index')->middleware('auth');
    Route::get('/home', 'HomeController@index')->middleware('auth');
    Route::get('/informasipendaftaran', 'InformasiPendaftaranController@index')->middleware('auth');
    Route::get('/murid/{id}/profile','MuridController@profile')->middleware('auth');
    Route::get('/guru', 'GuruController@index')->middleware('auth');
});
