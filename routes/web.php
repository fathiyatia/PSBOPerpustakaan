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

Route::get('/', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');



Route::group(['middleware' => 'auth'], function(){
            Route::get('/dashboard', 'DashboardController@index');

            /* ---------- User --------------  */

            Route::get('/admin', 'AdminController@index');
            Route::get('/admin/tambahadmin', 'AdminController@tambah');
            Route::post('/admin/tambahadmin/proses', 'AdminController@proses_tambah');
            
            /* ---------- Siswa --------------  */

            Route::get('/datasiswa', 'SiswaController@index');
            Route::get('/siswa', 'SiswaController@index_edit');

            Route::get('/Siswa/editdatasiswa/{siswa_id}', 'SiswaController@edit');
            Route::put('/Siswa/editdatasiswa/{siswa_id}/proses', 'SiswaController@proses_edit');

            // Route::get('/datasiswa', function () {
            //     return view('Siswa/datasiswa');
            // });

            // Route::get('/editdatasiswa', function () {
            //     return view('Siswa/editdatasiswa');
            // });


            /* ---------- Pegawai --------------  */

            Route::get('/datapegawai', function () {
                return view('Pegawai/datapegawai');
            });

            Route::get('/pegawai', function () {
                return view('Pegawai/pegawai');
            });

            Route::get('/editdatapegawai', function () {
                return view('Pegawai/editdatapegawai');
            });


            /* ---------- Buku --------------  */

            Route::get('/buku', 'BukuController@index');

            Route::get('/buku/tambahbuku', 'BukuController@tambah');
            Route::post('/buku/tambahbuku/proses', 'BukuController@proses_tambah');

            Route::get('/buku/editbuku/{buku_id}', 'BukuController@edit');
            Route::put('/buku/editbuku/{buku_id}/proses', 'BukuController@proses_edit');

            /* ---------- Peminjaman --------------  */

            Route::get('/peminjaman', function () {
                return view('Peminjaman/peminjaman');
            });

            Route::get('/tambahpeminjaman', function () {
                return view('Peminjaman/tambahpeminjaman');
            });

            Route::get('/confirmpeminjaman', function () {
                return view('Peminjaman/confirmpeminjaman');
            });

            /* ---------- Kunjungan --------------  */

            Route::get('/kunjungansiswa', function () {
                return view('Kunjungan/kunjungansiswa');
            });

            Route::get('/kunjungantamu', 'KunjunganMasyarakatController@index');
            Route::get('/kunjungantamu/{tujuan}/{masyarakat_id}', 'KunjunganMasyarakatController@tambah');

            /* ---------- Buku Tamu --------------  */

            Route::get('/formsiswa', function () {
                return view('Bukutamu/formsiswa');
            });

            Route::get('/formtamu', 'MasyarakatController@berkunjung');
            Route::post('/formtamu/catat', 'MasyarakatController@pencatatan');  
            
            Route::get('/bukutamu', function () {
                return view('Bukutamu/bukutamu');
            });

            /* ------------------------------------  */

            Route::get('/navbar', function () {
                return view('navbar');
            });

            Route::get('/template', function () {
                return view('template');
            });

});

