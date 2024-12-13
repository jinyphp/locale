<?php
namespace Jiny\Locale\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminLocale extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        $this->actions['view']['layout'] = "jiny-locale::admin.dash.layout";

        // 커스텀 레이아웃
        $this->actions['title'] = "지역설정";
        $this->actions['subtitle'] = "시스템의 국가, 언어, 통화를 설정합니다.";
    }


}
