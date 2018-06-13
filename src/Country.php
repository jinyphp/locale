<?php
namespace Jiny\Locale;

trait Country
{
    private $_countrys = [];

    private function initCountry()
    {
        //echo __METHOD__."<br>";

        // 국가 데이터를 초기화 합니다. 
        $datafile = ROOT.DS."vendor".DS."jiny".DS."locale".DS."data".DS."country.php";
        $this->_countrys = include $datafile;
    }

    public function isCountry($code)
    {
        //echo __METHOD__."<br>";
        
        // 대문자로 변경후, 코드를 매칭합니다.
        $code = strtoupper($code);      

        if( empty($this->_countrys) ){
            $this->initCountry();
        }

        if($this->_countrys[ $code ]){
            return $code;
        }

        return NULL;
    }

    /**
     * Application의 _Country를 설정합니다.
     */
    public function setAppCountry($code)
    {
        if ($this->Application) {
            $this->Application->_Country = $code;                      
        } else {
            //
            echo "Err] Application 인스턴스가 없습니다.<br>";
        }
    }

    public function getCountries()
    {
        return $this->_countrys;
    }


}