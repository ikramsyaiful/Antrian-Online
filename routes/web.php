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

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    //Read Tabel
    Route::get('/read', 'ReadController@read')->name('read');

    Route::get('/index', 'ReadController@index')->name('index');
    
    Route::get('/dashboard', 'ReadController@dashboard')->name('dashboard');

    Route::get('/show/{data}', 'Data\Table\View\ViewController@semua2')->name('show');
    //-------------------------------------------------------

    //Crud//
    //create//
    Route::post('/index', 'Data\Table\Fungsi\FungsiController@buat_antrian')->name('buat_antri');
    Route::post('/show/{id}', 'Data\Table\Fungsi\FungsiController@tambah_antrian')->name('tambah_antri');
    //

    //------------------------------
    //edit//
    Route::get('/edit/antrian/{data}/edit', 'Data\Table\View\ViewController@editantrian')->name('edit_antrian');
    Route::patch('/edit/antrian/{data}', 'Data\Table\Fungsi\FungsiController@updateantrian')->name('update_antrian');

    //edit2//
    Route::get('/data_antri/{data}/edit', 'Data\Table\View\ViewController@edit')->name('data_antri.edit');
    Route::patch('/data_antri/{data}', 'Data\Table\Fungsi\FungsiController@update')->name('data_antri.update');

    //profile//
    Route::get('/profile', 'Data\Table\View\ViewController@profileshow')->name('profile');

    //edit profile//
    Route::get('/profile/edit', 'Data\Table\View\ViewController@editprofile')->name('profile.edit');
    Route::post('/profile/edit', 'Data\Table\Fungsi\FungsiController@update_data')->name('profile.update');
    Route::post('/profile/edited', 'Data\Table\Fungsi\FungsiController@update_pic')->name('profile.pic');
    Route::post('/profile/editedbg', 'Data\Table\Fungsi\FungsiController@update_bg')->name('profile.bg');
    //edit password//
    Route::get('/password/edit', 'Data\Table\View\ViewController@editpassword')->name('user.password.edit');
    Route::patch('/password/edit', 'Data\Table\Fungsi\FungsiController@updatepassword')->name('user.password.update');
    //----------------------------------------------------------------

    //antrian//
    Route::get('/data_antri/jalan/{data}/antrian', 'Data\Table\View\ViewController@antrianedit')->name('data_antri.antrianedit');
    Route::patch('/data_antri/jalan/{data}', 'Data\Table\Fungsi\FungsiController@antrianupdate')->name('data_antri.antrianupdate');
    //delete//
     Route::get('/read/delete1/{data}', 'Data\Table\Fungsi\FungsiController@destroy')->name('data_antri.destroy');
     Route::get('/show/delete2/{data}', 'Data\Table\Fungsi\FungsiController@destroy2')->name('data_antri.destroy2');
    //-------------------------------------------------------

    //show//
    //detail//
    Route::get('/data_antri/{data}', 'Data\Table\View\ViewController@show')->name('data_antri.show');
    //barcode//
    Route::get('/data_antri/barcode/{data}', 'Data\Table\View\ViewController@barcode')->name('data_antri.barcode');
    //-------------------------------------------------------

    //scan//
    //scan nomor antri//
    Route::get('/data_antri/scan/{data}', 'Data\Table\View\ViewController@scanview')->name('data_antri.scan');
    //scan verifikasi//
    Route::get('/data_antri/verifikasi/{data}', 'Data\Table\View\ViewController@verifikasiview')->name('data_antri.verifikasi');
    //--------------------------------------------------------
});

//Admin masuk

    Route::group(['middleware' => ['is_admin']], function () {

            //dashboard
            Route::get('/admin/data/index', 'Admin\AdminDataController@index')->name('admin.data.index');
            //----

            //----Menu

            //User-----
            Route::get('/admin/data/user', 'Admin\AdminDataController@user')->name('admin.data.user');
            Route::get('/admin/data/user/cari','Admin\AdminDataController@cariuser');
            //infokontak-----
            Route::get('/admin/data/infokontak', 'Admin\AdminDataController@infokontak')->name('admin.data.infokontak');
            //Antrian
            Route::get('/admin/data/viewantrian', 'Admin\AdminDataController@viewantrian')->name('admin.data.viewantrian');
            Route::get('/admin/data/viewantrian/cari','Admin\AdminDataController@cariantrian');
            //Daftar Antrian
            Route::get('/admin/data/viewdaftarantrian', 'Admin\AdminDataController@viewdaftarantrian')->name('admin.data.viewdaftarantrian');
            Route::get('/admin/data/viewdaftarantrian/cari','Admin\AdminDataController@caridaftarantrian');
            //---------

            Route::get('/admin/data/user/{data}', 'Admin\AdminDataController@antrian')->name('admin.data.antrian');
            Route::get('/admin/data/user/daftar/{data}', 'Admin\AdminDataController@daftarantrian')->name('admin.data.daftarantrian');
            //--------

            //crud//-------------------------------------------------------------------------------------------------------------

            //user-------------
            //create user
            Route::get('/admin/data/tambahuser', 'Admin\AdminDataController@tambahuser')->name('admin.data.tambahuser');
            Route::post('/admin/data/tambahuser', 'Admin\AdminFungsiController@tambahuser')->name('admin.data.createuser');
            //edit user
            Route::get('/admin/data/edit/{data}', 'Admin\AdminDataController@edituser')->name('admin.data.edituser');
            Route::patch('/admin/data/edit/{data}/edit', 'Admin\AdminFungsiController@edituser')->name('admin.data.editeduser');
            //delete user
            Route::get('/admin/delete/{data}', 'Admin\AdminFungsiController@destroy')->name('admin.data.destroy');
            //----------------

            //antrian----------
            //create antrian
            Route::post('/admin/data/user/{id}', 'Admin\AdminFungsiController@tambahantrian')->name('admin.data.tambahantrian');
            //edit antrian
            Route::get('/admin/data/editantrian/{data}', 'Admin\AdminDataController@editantrian')->name('admin.data.editantrian');
            Route::patch('/admin/data/editantrian/{data}/edit', 'Admin\AdminFungsiController@editantrian')->name('admin.data.editedantrian');
            Route::patch('/admin/data/editpassword/{data}/edit', 'Admin\AdminFungsiController@updatepassword')->name('admin.data.updatepassword');
            //delete antrian
            Route::get('/admin/delete/antrian/{data}', 'Admin\AdminFungsiController@destroyantrian')->name('admin.data.destroyantrian');
            //------------------

            //daftar antrian----------
            //create daftar antrian
            Route::post('/admin/data/user/daftar/{id}', 'Admin\AdminFungsiController@tambahdaftarantrian')->name('admin.data.tambahdaftarantrian');
            //edit daftar antrian
            Route::get('/admin/data/editdaftarantrian/{data}/edit', 'Admin\AdminDataController@editdaftarantrian')->name('admin.data.editdaftarantrian');
            Route::patch('/admin/data/editdaftarantrian/{data}', 'Admin\AdminFungsiController@editdaftarantrian')->name('admin.data.antrianupdate');
            //delete daftar antrian
            Route::get('/admin/delete/daftarantrian/{data}', 'Admin\AdminFungsiController@destroydaftarantrian')->name('admin.data.destroydaftarantrian');
            //------------------
            
            //-------------------------------------------------------------------------------------------------------------------
    });
//-----------------------------------------------------------------------

//pengguna
   Route::get('/detail/{data}', 'PenggunaController@showpengguna')->name('showpengguna');
   Route::get('/', 'PenggunaController@viewpengguna')->name('pengguna');
   Route::get('/cari','PenggunaController@cari');
   Route::get('/pengguna/qrcode/{data}', 'Data\Table\View\ViewController@barcodepengguna')->name('pengguna.barcode');
//------------------------------------------------------------

//API
Route::post('/api/scan/{data}','Data\Table\Api\ApiController@scan');
Route::post('/api/verifikasi/{data}','Data\Table\Api\ApiController@verifikasi');
//---------------------------------------------------------------------------------------------------------------

