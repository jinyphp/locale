<?php
namespace Jiny\Locale;

trait Language
{
    private $_languages = [];

    private function initLanguage()
    {
        // 언어 데이터를 초기화 합니다. 
        $datafile = ROOT.DS."vendor".DS."jiny".DS."locale".DS."data".DS."language.php";
        $this->_languages = include $datafile;
    }

    public function isLanguage($code)
    {
        //echo __METHOD__."<br>";
        
        // 소문자로 변경후, 코드를 매칭합니다.
        $code = strtolower($code); 

        if( empty($this->_languages) ){
            $this->initLanguage();
        }

        if($this->_languages[ $code ]){
            return $code;
        }

        return NULL;
    }

    /**
     * Application의 _Country를 설정합니다.
     */
    public function setAppLanguage($code)
    {
        if ($this->Application) {
            $this->Application->_Language = $code;                      
        } else {
            //
            echo "Err] Application 인스턴스가 없습니다.<br>";
        }
    }

    public function getLanguages()
    {
        return $this->_languages;
    }


}