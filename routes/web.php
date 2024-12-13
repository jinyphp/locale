<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// admin prefix 모듈 검사
// admin 모듈에 선언됨
if(function_exists('admin_prefix')) {
    $prefix = admin_prefix();
} else {
    $prefix = "admin";
}

Route::middleware(['web','auth:sanctum', 'verified', 'admin'])
->name('admin.locale')
->prefix($prefix.'/locale')->group(function () {

    Route::get('/',[
        \Jiny\Locale\Http\Controllers\AdminLocale::class,
        'index'
    ]);

    Route::resource('/country',
        \Jiny\Locale\Http\Controllers\Admin\AdminCountry::class);

    Route::get('/language',[
        \Jiny\Locale\Http\Controllers\Admin\AdminLanguage::class,
        'index'
    ]);

    Route::get('/currency',[
        \Jiny\Locale\Http\Controllers\Admin\AdminCurrency::class,
        'index'
    ]);

    Route::get('/currency/log/{id?}',[
        \Jiny\Locale\Http\Controllers\Admin\AdminCurrencyLog::class,
        'index'
    ])->where('id', '[0-9]+');
});


// 국기 이미지 출력
Route::middleware(['web'])
->prefix('images')->group(function() {
    Route::get('flags/{code}', [
        \Jiny\Locale\Http\Controllers\FlagImage::class,
        'index'])->where('code', '[a-z]+\.(png|jpg|jpeg|gif)');
});
