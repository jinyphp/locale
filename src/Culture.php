<?php
namespace Jiny\Locale;

trait Culture
{
    private $_cultures = [];
    
    /**
     * 문화 데이터를 초기화 합니다.
     * 데이터 파일을 읽어 배열화 합니다.
     */
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

    public function setCulture($code)
    {
        \TimeLog::set("culture...".$code); 
        $this->_culture = $code;
    }

    public function getCulture()
    {
        return $this->_culture;
    }


    /**
     * 문화 목록을 반환합니다.
     */
    public function getCultures()
    {
        // \TimeLog::set(__METHOD__);
        return $this->_cultures;
    }

    /**
     * 
     */
}