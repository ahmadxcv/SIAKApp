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

Route::group(['middleware' => ['get.menu']], function () {
    Route::get('/', 'WelcomeController@index');

    Auth::routes();

    //  Admin
    Route::group(['middleware' => ['role:admin']], function () {       
        Route::get('/dashboard', 'AdminController@index');
        Route::get('/pengajuan', 'AdminController@Pengajuan');
        Route::get('/jadwal', 'AdminController@Jadwal');
        Route::prefix('laporan')->group(function () {
            Route::get('/', 'AdminController@index');  
            Route::get('/pengajuan', 'Admin\LaporanController@Pengajuan');
            Route::get('/jadwal', 'Admin\LaporanController@Jadwal');
        });
        Route::prefix('cetak')->group(function () {
            Route::get('/', 'AdminController@index');             
            Route::get('/pengajuan', 'Admin\LaporanController@cetak_Pengajuan');
            Route::get('/jadwal', 'Admin\LaporanController@cetak_Jadwal');
        });
        Route::prefix('detail')->group(function ($id) {
            Route::get('/', 'AdminController@index');  
            Route::get('/detail/{id}/{id_jenis}', 'Admin\DetailController@Jenis');
            Route::get('/pengajuan/{id}', 'Admin\DetailController@Pengajuan');

            Route::get('/regkk/{id}', 'Admin\DetailController@RegKK');
            Route::get('/editkk/{id}', 'Admin\DetailController@EditKK');
            Route::get('/gantikk/{id}', 'Admin\DetailController@GantiKK');
            Route::get('/mutasikk/{id}', 'Admin\DetailController@MutasiKK');
            Route::put('/validasi', 'Admin\DetailController@update')->name('saveValidasi');

            //Route::get('/jadwal', 'DetailController@Jadwal');
        });
    });
    //  Penduduk
    Route::group(['middleware' => ['role:penduduk']], function () {
        Route::get('/home', 'PendudukController@index');
        Route::prefix('pengajuan')->group(function (){  
            //Route::get('/', 'PendudukController@index');
            Route::get('/regkk', 'Penduduk\RegkkController@create');
            Route::get('/editkk', 'Penduduk\EditkkController@create');
            Route::get('/gantikk', 'Penduduk\GantikkController@create');
            Route::get('/mutasikk', 'Penduduk\MutasikkController@create');
        });
        Route::prefix('data')->group(function (){
            Route::get('/', 'PendudukController@index');
            Route::get('/pengajuan', 'PendudukController@pengajuan');
            Route::get('/jadwal', 'PendudukController@jadwal');
        });
        
        Route::post('/regkk', 'Penduduk\RegkkController@store')->name('simpanReg');
        Route::post('/editkk', 'Penduduk\EditkkController@store')->name('simpanEdit');
        Route::post('/gantikk', 'Penduduk\GantikkController@store')->name('simpanGanti');
        Route::post('/mutasikk', 'Penduduk\MutasikkController@store')->name('simpanMutasi');
    });


    //Coreui
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users','UsersController')->except( ['create', 'store'] );
        Route::resource('notes', 'NotesController');
        Route::resource('roles', 'RolesController');
        Route::get('/roles/move/move-up', 'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down', 'RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () { 
            Route::get('/', 'MenuElementController@index')->name('menu.index');
            Route::get('/move-up', 'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down', 'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create', 'MenuElementController@create')->name('menu.create');
            Route::post('/store', 'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents', 'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () { 
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });
        
    });
});