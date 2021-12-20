<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
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

// Route::get('kirimemail', function () {
//     \Mail::raw('Hallo Siswa Baru', function ($message) {
//         $message->to('junandaari@gmail.com', 'Ari');
//         $message->subject('Pendaftaran Siswa Baru');
//     });
// });


Route::get('/', 'AuthController@login')->name('/login');
Route::get('/register', 'SiteController@register');
Route::get('/registrasiSekolah', 'AuthController@registrasiSekolah');
Route::post('postregister', 'SiteController@postregister');

// Route::get('/posts', 'PostController@index')->name('posts.index');




// sekolah
Route::get('/sekolah', 'AuthController@index');
Route::get('/sekolah/{sekolah}/edit', 'AuthController@edit');
Route::post('sekolah/{id}/update', 'AuthController@update');

//kelas
Route::get('/kelas', 'SekolahController@kelas');

// login, register
Route::get('/daftar_sekolah', 'AuthController@daftar_sekolah')->name('daftar_sekolah');

Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');



Route::group(['middleware'=> ['auth', 'checklevel:admin']], function () {

        Route::get('/dashboard', 'DashboardController@index')->name('login');

        //siswa
        Route::get('siswa.index', [SiswaController::class, 'index'])->name('siswa.index');
        Route::get('siswa.index', [SiswaController::class, 'index'])->name('siswa.index');
        Route::post('siswa.store', [SiswaController::class, 'store'])->name('siswa.store');
        Route::post('siswa.edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::post('siswa.updates', [SiswaController::class, 'updates'])->name('siswa.updates');
        Route::post('siswa.hapus', [SiswaController::class, 'hapus'])->name('siswa.hapus');

        // nilai
        

        // mapel
        Route::get('mapel.index', [MapelController::class, 'index'])->name('mapel.index');
        Route::get('mapel.index', [MapelController::class, 'index'])->name('mapel.index');
        Route::post('mapel.store', [MapelController::class, 'store'])->name('mapel.store');
        Route::post('mapel.edit', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::post('mapel.update', [MapelController::class, 'update'])->name('mapel.update');
        Route::post('mapel.destroy', [MapelController::class, 'destroy'])->name('mapel.destroy');

        // kelas
        Route::get('kelas.index', [KelasController::class, 'index'])->name('kelas.index');
        Route::post('kelas.store', [KelasController::class, 'store'])->name('kelas.store');
        Route::post('kelas.edit', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::post('kelas.update', [KelasController::class, 'update'])->name('kelas.update');
        Route::post('kelas.destroy', [KelasController::class, 'destroy'])->name('kelas.destroy');

        Route::post('/siswa/create', 'SiswaController@create');
        Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
        Route::post('siswa/{id}/update', 'SiswaController@update');
        Route::get('siswa/{id}/delete', 'SiswaController@destroy');
        Route::get('/siswa/{id}/profile', 'SiswaController@profile');

        //  nilai siswa
        Route::get('/nilaisiswa', 'SiswaController@nilaisiswa');
        Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');
        Route::get('/siswa/{id}/{idmapel}/deletenilai', 'SiswaController@deletenilai');


        // guru
        Route::get('guru.index', [GuruController::class, 'index'])->name('guru.index');
        Route::post('guru.store', [GuruController::class, 'store'])->name('guru.store');
        Route::post('guru.edit', [GuruController::class, 'edit'])->name('guru.edit');
        Route::post('guru.update', [GuruController::class, 'update'])->name('guru.update');
        Route::post('guru.destroy', [GuruController::class, 'destroy'])->name('guru.destroy');


        Route::get('/guru/{id}/profile', 'GuruController@profile');

        Route::get('/siswa/exportExcel', 'SiswaController@exportExcel');
        Route::post('/siswa/importExcel', 'SiswaController@importExcel')->name('siswa.import');
        Route::get('/siswa/exportPdf', 'SiswaController@exportPdf');

        Route::get('/nilaisiswa', 'SiswaController@nilaisiswa');

        Route::get('/post/add', [ 'uses'=> 'PostController@add',
            'as'=> 'posts.add'
            ]);
        Route::get('getdatasiswa', [ 'uses'=> 'SiswaController@getdatasiswa',
            'as'=> 'ajax.get.data.siswa'
            ]);

        Route::post('/post/create', [ 'uses'=> 'PostController@create',
            'as'=> 'posts.create'
            ]);
    }

);

Route::group(['middleware' => ['auth', 'checklevel: wali kelas,admin']], function(){
Route::get('/dashboard','DashboardController@index')->name('/login');
} );

Route::group(['middleware' => ['auth','checklevel:admin,guru mapel']], function(){
Route::get('/dashboard','DashboardController@index')->name('login');
} );

// Route::group(['middleware'=> ['auth', 'checklevel:admin,siswa']], function () {
//         Route::get('/dashboard', 'DashboardController@index')->name('login');
//     });

Route::group(['middleware'=> ['auth', 'checklevel:siswa']], function () {
        Route::get('/profilesaya', 'SiswaController@profilesaya');
    }

);



// guru
Route::get('/guru', 'GuruController@index');