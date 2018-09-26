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

trait Language
{
    private $_languages = [];

    /**
     * 언어 데이터를 초기화 합니다.
     * 데이터 파일을 읽어 배열화 합니다.
     */
    private function initLanguage()
    {
        // 언어 데이터를 초기화 합니다. 
        $datafile = ROOT.DS."vendor".DS."jiny".DS."locale".DS."data".DS."language.php";
        $this->_languages = include $datafile;
    }

    /**
     * 언어 코드를 확인합니다.
     */
    public function isLanguage($code)
    {
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

    /**
     * 언어를 설정합니다.
     */
    public function setLanguage($code)
    {
        $this->_language = $code;
    }

    /**
     * 언어를 읽어옵니다.
     */
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * 언어 목록을 반환합니다.
     */
    public function getLanguages()
    {
        return $this->_languages;
    }

    /**
     * 
     */
}