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
        // 문화 데이터를 초기화 합니다. 
        $datafile = ROOT.DS."vendor".DS."jiny".DS."locale".DS."data".DS."culture.php";
        $this->_cultures = include $datafile;
    }  

    public function isCulture($code)
    {
        if( empty($this->_cultures) ){
            $this->initCulture();
        }

        if (isset($this->_cultures[ $code ])) {
            return $code;
        }

        return NULL;
    }

    /**
     * 문화를 설정합니다.
     */
    public function setCulture($code)
    {
        $this->_culture = $code;
    }

    /**
     * 문화를 읽어옵니다.
     */
    public function getCulture()
    {
        return $this->_culture;
    }


    /**
     * 문화 목록을 반환합니다.
     */
    public function getCultures()
    {
        return $this->_cultures;
    }

    /**
     * 
     */
}