<?php
namespace Jiny\Locale;

trait Country
{
    private $_countrys = [];

    /**
     * 국가 데이터를 초기화 합니다.
     * 데이터 파일을 읽어 배열화 합니다.
     */
    private function initCountry()
    {
        // \TimeLog::set(__METHOD__);
        $datafile = ROOT.DS."vendor".DS."jiny".DS."locale".DS."data".DS."country.php";
        $this->_countrys = include $datafile;
        return $this;
    }

    /**
     * 국가 코드를 확인합니다.
     */
    public function isCountry($code)
    {
        // \TimeLog::set(__METHOD__);        
        // 대문자로 변경후, 코드를 매칭합니다.
        $code = strtoupper($code);      

        // 목록을 동적으로 로딩합니다.
        // 사용하지 않는 경우 메모리를 절약합니다.
        if( empty($this->_countrys) ) $this->initCountry();
    
        // 배열값이 있는 경우
        if (isset($this->_countrys[ $code ])) {
            return $code;
        }

        return NULL;
    }

    public function setCountry($code)
    {
        \TimeLog::set("country...".$code);
        $this->_country = $code;
    }

    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * Application의 _Country를 설정합니다.
     */
    public function setAppCountry($code)
    {
        // \TimeLog::set(__METHOD__);
        if ($this->App) $this->App->_Country = $code;                      
        return $this;
    }

    /**
     * 국가목록 배열을 반환합니다.
     */
    public function getCountries()
    {
        // \TimeLog::set(__METHOD__);
        return $this->_countrys;
    }

    /**
     * 
     */
}