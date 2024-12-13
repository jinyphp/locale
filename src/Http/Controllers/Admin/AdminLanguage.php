<?php
namespace Jiny\Locale\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminLanguage extends WireTablePopupForms
{
    //const MENU_PATH = "menus";
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "language"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['layout'] = "jiny-locale::admin.language.layout";

        $this->actions['view']['list'] = "jiny-locale::admin.language.list";
        $this->actions['view']['form'] = "jiny-locale::admin.language.form";

        $this->actions['view']['filter'] = "jiny-locale::admin.language.filter";


        // 커스텀 레이아웃
        $this->actions['title'] = "언어목록";

        // //dd(config("locale.country"));
        // $country = config("locale.language");
        // foreach($country as $item) {

        // }


    }

    /**
     * 신규 데이터 DB 삽입전에 호출됩니다.
     */
    public function hookStoring($wire,$form)
    {
        $lang = 'ko';
        $language = config('jiny.language');
        if(isset($form['code'])) {
            if(!isset($form['name'])) {
                $form['name'] = $language[$form['code']][$lang];
            }
        }

        return $form; // 사전 처리한 데이터를 반환합니다.
    }

    /**
     * 데이터 수정전에 호출됩니다.
     */
    public function hookUpdating($wire, $form, $old)
    {
        $lang = 'ko';
        $language = config('jiny.language');
        if(isset($form['code'])) {
            if(!isset($form['name'])) {
                $form['name'] = $language[$form['code']][$lang];
            }
        }

        return $form;
        return true; // 정상
    }


}
