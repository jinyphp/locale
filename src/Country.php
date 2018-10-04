<?php
/*
 * This file is part of the jinyPHP package.
 *
 * (c) hojinlee <infohojin@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jiny\Locale;

trait Country
{
    private $_countrys = [];

    /**
     * 국가 데이터를 초기화 합니다.
     * 데이터 파일을 읽어 배열화 합니다.
     */
    private function initCountry($type="json")
    {
        $path = ROOT.DS."vendor".DS."jiny".DS."locale".DS."data".DS;
        if($type == "php"){
            $datafile = $path."country.php";
            if (file_exists($datafile)) {
                $this->_countrys = include $datafile;
            }            
        } else {
            $datafile = $path."country".DS."country.json";
            if (file_exists($datafile)) {
                $str = file_get_contents($datafile);
                $this->_countrys = json_decode($str, true);
            }
        }        

        return $this;
    }

    /**
     * 국가 코드를 확인합니다.
     */
    public function isCountry($code)
    {      
        // 대문자로 변경후, 코드를 매칭합니다.
        $code = strtoupper($code);   

        // 목록을 동적으로 로딩합니다.
        // 사용하지 않는 경우 메모리를 절약합니다.
        if( empty($this->_countrys) ) $this->initCountry("json");
    
        // 배열값이 있는 경우
        if (isset($this->_countrys[ $code ])) {
            return $code;
        }

        return NULL;
    }

    /**
     * 국가를 설정합니다.
     */
    public function setCountry($code)
    {
        $this->_country = $code;
    }

    /**
     * 국가를 읽어옵니다.
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * 국가목록 배열을 반환합니다.
     */
    public function getCountries()
    {
        return $this->_countrys;
    }

    /**
     * 
     */
}