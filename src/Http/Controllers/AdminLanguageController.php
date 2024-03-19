<?php
namespace Jiny\Locale\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

use Jiny\Auth\Models\User;
use Jiny\Auth\Models\Role;

use Jiny\WireTable\Http\Controllers\LiveController;
class AdminLanguageController extends LiveController
{
    //const MENU_PATH = "menus";
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "language"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['list'] = "locale::admin.language.list";
        $this->actions['view']['form'] = "locale::admin.language.form";

        $this->actions['view']['filter'] = "locale::admin.language.filter";


        // 커스텀 레이아웃
        $this->actions['title'] = "언어목록";

        //dd(config("locale.country"));
        $country = config("locale.language");
        foreach($country as $item) {

        }


    }


}
