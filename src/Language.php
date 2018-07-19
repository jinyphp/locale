<?php
namespace Jiny\Locale;

trait Language
{
    private $_languages = [];

    /**
     * 언어 데이터를 초기화 합니다.
     * 데이터 파일을 읽어 배열화 합니다.
     */
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

        // 배열값이 있는 경우
        if (isset($this->_languages[ $code ])) {
            return $code;
        }

        return NULL;
    }

    public function setLanguage($code)
    {
        \TimeLog::set("language...".$code); 
        $this->_language = $code;
    }

    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * Application의 _Country를 설정합니다.
     */
    public function setAppLanguage($code)
    {
        // \TimeLog::set(__METHOD__);
        if ($this->App) $this->App->_Language = $code;                      
        return $this;
    }

    /**
     * 언어 목록을 반환합니다.
     */
    public function getLanguages()
    {
        // \TimeLog::set(__METHOD__);
        return $this->_languages;
    }

    /**
     * 
     */
}