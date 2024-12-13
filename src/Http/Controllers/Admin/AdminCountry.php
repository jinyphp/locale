<?php
namespace Jiny\Locale\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminCountry extends WireTablePopupForms
{

    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "country"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['layout'] = "jiny-locale::admin.country.layout";

        $this->actions['view']['list'] = "jiny-locale::admin.country.list";
        $this->actions['view']['form'] = "jiny-locale::admin.country.form";

        $this->actions['view']['filter'] = "jiny-locale::admin.country.filter";


        // 커스텀 레이아웃
        $this->actions['title'] = "국가목록";

    }

    /**
     * 신규 데이터 DB 삽입전에 호출됩니다.
     */
    public function hookStoring($wire,$form)
    {
        $lang = 'ko';
        $country = config('jiny.country');
        if(isset($form['code'])) {
            if(!isset($form['name'])) {
                $form['name'] = $country[$form['code']][$lang];
            }
            if(!isset($form['latitude'])) {
                $form['latitude'] = $country[$form['code']]['latitude'];
            }
            if(!isset($form['longitude'])) {
                $form['longitude'] = $country[$form['code']]['longitude'];
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
        $country = config('jiny.country');
        if(isset($form['code'])) {
            if(!isset($form['name'])) {
                $form['name'] = $country[$form['code']][$lang];
            }
            if(!isset($form['latitude'])) {
                $form['latitude'] = $country[$form['code']]['latitude'];
            }
            if(!isset($form['longitude'])) {
                $form['longitude'] = $country[$form['code']]['longitude'];
            }
        }

        return $form;
        return true; // 정상
    }


}
