<?php
namespace Jiny\Locale\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

/**
 * Currency
 */
use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminCurrency extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ## 테이블 정보
        $this->actions['table']['name'] = "currency";

        $this->actions['view']['layout']
            = "jiny-locale::admin.currency.layout";
        $this->actions['view']['table']
            = "jiny-locale::admin.currency.table";
        $this->actions['view']['list']
            = "jiny-locale::admin.currency.list";
        $this->actions['view']['form']
            = "jiny-locale::admin.currency.form";

        $this->actions['title'] = "Currency";
        $this->actions['subtitle'] = "Currency를 관리합니다.";


    }


    public function index(Request $request)
    {
        return parent::index($request);
    }

    /**
     * 신규 데이터 DB 삽입전에 호출됩니다.
     */
    public function hookStoring($wire,$form)
    {
        DB::table('currency_log')->insert([
            'currency' => $form['name'],
            'rate' => $form['rate'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return $form; // 사전 처리한 데이터를 반환합니다.
    }

    /**
     * 데이터 수정전에 호출됩니다.
     */
    public function hookUpdating($wire, $form, $old)
    {
        DB::table('currency_log')->insert([
            'currency' => $form['name'],
            'rate' => $form['rate'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return $form;
        return true; // 정상
    }





}
