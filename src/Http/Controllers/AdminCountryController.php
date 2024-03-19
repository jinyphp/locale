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
class AdminCountryController extends LiveController
{
    //const MENU_PATH = "menus";
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "country"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['list'] = "locale::admin.country.list";
        $this->actions['view']['form'] = "locale::admin.country.form";

        $this->actions['view']['filter'] = "locale::admin.country.filter";


        // 커스텀 레이아웃
        $this->actions['title'] = "국가목록";

        //dd(config("locale.country"));
        $country = config("locale.country");
        foreach($country as $item) {

        }


    }


}
