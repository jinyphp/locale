<?php
namespace Jiny\Locale;

trait Culture
{
    private $_culture = [];
    
    private function initCulture()
    {
        // \TimeLog::set(__METHOD__);
        // 문화 데이터를 초기화 합니다. 
        $datafile = ROOT.DS."vendor".DS."jiny".DS."locale".DS."data".DS."culture.php";
        $this->_cultures = include $datafile;
    }  

    public function isCulture($code)
    {
        // \TimeLog::set(__METHOD__);
        if( empty($this->_cultures) ){
            $this->initCulture();
        }

        if (isset($this->_cultures[ $code ])) {
            return $code;
        }

        return NULL;
    }


}