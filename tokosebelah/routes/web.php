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

Route::get('/', 'IndexController@index');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'profile'], function(){
    Route::get('/', 'User\ProfileController@profile')->middleware('auth');
    Route::get('/edit', 'User\ProfileController@edit');
    Route::get('/{id}', 'User\ProfileController@profile');
    Route::post('/update', 'User\ProfileController@update');
    Route::get('/hapus-iklan/{id}', 'User\ProfileController@hapusIklan');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'Admin\AdminUserController@user');
    
    Route::group(['prefix' => 'list-user'], function(){
        Route::get('/', 'Admin\AdminUserController@user');
        Route::post('/delete/{id}', 'Admin\AdminUserController@delete');
    });

    Route::group(['prefix' => 'kategori-iklan'], function(){
        Route::get('/', 'Admin\AdminKategoriIklanController@kategoriIklan');
        Route::post('/tambah-kategori', 'Admin\AdminKategoriIklanController@tambahKategori');
        Route::get('/hapus-kategori/{id}', 'Admin\AdminKategoriIklanController@hapusKategori');
    });
    
    Route::group(['prefix' => 'list-iklan'], function(){
        Route::get('/', 'Admin\AdminIklanController@listIklan');
        Route::get('/lihat-iklan/{id}', 'Admin\AdminIklanController@lihatIklan');
        Route::get('/lihat-iklan/verify/{id}', 'Admin\AdminIklanController@verify');
        Route::get('/lihat-iklan/tolak/{id}', 'Admin\AdminIklanController@tolak');
        Route::get('/lihat-iklan/hapus/{id}', 'Admin\AdminIklanController@hapus');
    });
    
    Route::group(['prefix' => 'verifikasi-pembayaran'], function(){    
        Route::get('/', 'Admin\AdminVerifikasiPembayaranController@veriPembayaran');  
        Route::get('/detail-pembayaran/{id}', 'Admin\AdminVerifikasiPembayaranController@detailPembayaran');  
        Route::get('/detail-pembayaran/daftar-belanja/{id}/{idUser}', 'Admin\AdminVerifikasiPembayaranController@daftarBelanja'); 
        Route::get('/detail-pembayaran/verified/{idPembayaran}/{idUser}', 'Admin\AdminVerifikasiPembayaranController@verifikasi');  
        Route::get('/detail-pembayaran/tolak/{id}', 'Admin\AdminVerifikasiPembayaranController@tolak');   
        Route::get('/detail-pembayaran/hapus/{id}', 'Admin\AdminVerifikasiPembayaranController@hapus');    
    });    
});

Route::group(['prefix' => 'iklan'], function(){
    Route::get('/tambah', 'Iklan\IklanController@add')->middleware('auth');
    Route::post('/tambah/save', 'Iklan\IklanController@save')->middleware('auth');
    Route::get('/list-by-kategori/{id}', 'Iklan\IklanController@listByKategori');
    
    Route::group(['prefix' => 'detail'], function(){
        Route::post('/tambah-daftar-belanja/{id}', 'Iklan\BelanjaController@belanja');
        Route::post('/beli-sekarang/{id}', 'Iklan\BelanjaController@beliSekarang');
        Route::get('/{idKategori}/{idIklan}', 'Iklan\IklanController@detail');
        Route::get('/{idKategori}/{idIklan}/{idNotif}', 'Iklan\IklanController@detail');
        Route::post('/komentar', 'CommentController@add');
        Route::post('/like-dislike', 'Iklan\IklanController@likeDislike');
    });  
});

Route::group(['prefix' => 'pesanan'], function(){
    Route::get('/', 'Iklan\PesananController@pesanan');
    Route::get('/selesai', 'Iklan\PesananController@selesai');
    Route::get('/diterima', 'Iklan\PesananController@diterima');
});

Route::group(['prefix' => 'poin'], function(){
    Route::get('/', 'User\PoinController@poin');
    Route::post('/voucher', 'User\PoinController@tukarPoin');
});

Route::group(['prefix' => 'belanja'], function(){
    Route::get('/list-belanja', 'Iklan\BelanjaController@listBelanja');
    Route::get('/list-belanja/delete/{id}', 'Iklan\BelanjaController@delete');
    Route::get('/data-pengiriman', 'Iklan\PengirimanController@dataPengiriman');
    Route::get('/data-pengiriman/{nominal}', 'Iklan\PengirimanController@dataPengiriman');
    Route::get('/edit-data-pengiriman/{id}', 'Iklan\PengirimanController@editData');
    Route::post('/edit-data-pengiriman/edit/{id}', 'Iklan\PengirimanController@edit');
    Route::post('/data-pengiriman/selesai', 'Iklan\PengirimanController@selesai');
    Route::get('/data-pengiriman/pembayaran/selesai', 'Iklan\PembayaranController@gratis');
    Route::get('/pembayaran', 'Iklan\PembayaranController@bayar');
    Route::post('/pembayaran/upload', 'Iklan\PembayaranController@upload');
});

Route::group(['prefix' => 'panduan'], function(){
    Route::get('/cara-pembayaran', 'PanduanController@caraPembayaran');
    Route::get('/cara-pembelian', 'PanduanController@caraPembelian');
    Route::get('/cara-pasang-iklan', 'PanduanController@caraPasangIklan');
});

Route::get('/baca-pesan/{idPesan}/{idNotif}', 'PesanController@read');
Route::get('/search', 'SearchController@search');
Route::get('/tentang', 'IndexController@tentang');