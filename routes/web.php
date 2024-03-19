<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// 설정되 접속 prefix값을 읽어 옵니다.
$prefix = admin_prefix();

Route::middleware(['web','auth:sanctum', 'verified'])
->name('admin.')
->prefix($prefix)->group(function () {



});
