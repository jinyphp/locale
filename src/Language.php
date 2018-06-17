<?php
namespace Jiny\Locale;

trait Language
{
    private $_languages = [];

    private function initLanguage()
    {
        // \TimeLog::set(__METHOD__);
        // 언어 데이터를 초기화 합니다. 
        $datafile = ROOT.DS."vendor".DS."jiny".DS."locale".DS."data".DS."language.php";
        $this->_languages = include $datafile;
    }

    public function isLanguage($code)
    {
        // \TimeLog::set(__METHOD__);
        
        // 소문자로 변경후, 코드를 매칭합니다.
        $code = strtolower($code); 

        if( empty($this->_languages) ){
            $this->initLanguage();
        }

        if (isset($this->_languages[ $code ])) {
            return $code;
        }

        return NULL;
    }

    /**
     * Application의 _Country를 설정합니다.
     */
    public function setAppLanguage($code)
    {
        // \TimeLog::set(__METHOD__);
        if ($this->Application) {
            $this->Application->_Language = $code;                      
        } else {
            //
            echo "Err] Application 인스턴스가 없습니다.<br>";
        }
    }

    public function getLanguages()
    {
        // \TimeLog::set(__METHOD__);
        return $this->_languages;
    }


}