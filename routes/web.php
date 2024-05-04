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
    Route::resource('/country',\Jiny\Locale\Http\Controllers\AdminCountryController::class);
    Route::resource('/language',\Jiny\Locale\Http\Controllers\AdminLanguageController::class);
});


// 국기 이미지 출력
Route::middleware(['web'])
->prefix('images')->group(function() {
    Route::get('flags/{code}', [
        \Jiny\Locale\Http\Controllers\FlagImage::class,
        'index'])->where('code', '[a-z]+\.(png|jpg|jpeg|gif)');
});
