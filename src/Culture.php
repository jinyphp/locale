<?php
namespace Jiny\Locale;

trait Culture
{
    private $_culture = [];
    
    private function initCulture()
    {
        // 문화 데이터를 초기화 합니다. 
        $datafile = "../vendor/jiny/locale/data/culture.php";
        $this->_cultures = include $datafile;
    }  

    public function isCulture($code)
    {
        //echo __METHOD__."<br>";
        if( empty($this->_cultures) ){
            $this->initCulture();
        }

        if($this->_cultures[ $code ]){
            return $code;
        }

        return NULL;
    }


}