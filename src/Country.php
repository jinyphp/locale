<?php
namespace Jiny\Locale;

trait Country
{
    private $_countrys = [];

    private function initCountry()
    {
        // 국가 데이터를 초기화 합니다. 
        $datafile = "../vendor/jiny/locale/data/country.php";
        $this->_country = include $datafile;
    }

    public function isCountry($code)
    {
        echo __METHOD__."<br>";
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