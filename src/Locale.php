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

use \Jiny\Core\Registry\Registry;

class Locale
{
    private $App;

    public $_country, $_language, $_culture;

    use Country, Language, Culture;

    public function __construct()
    {
        //
    }

    /**
     * url 배열에서 로케일을 분석합니다.
     */
    public function parser($urls=[])
    {
        if ( $this->isCountry($urls[0]) ) {
            $this->setCountry($urls[0]);
            return [
                'country' => $this->_country,
                'language' => NULL
            ];

        } else if ( $this->isLanguage($urls[0]) ) {
            $this->setLanguage($urls[0]);
            return [
                'country' => NULL,
                'language' => $this->_language
            ];

        } else if ( $this->isCulture($urls[0]) ) {
            $code = explode("-",$urls[0]);                    
            $this->_language = $code[0];
            $this->setLanguage($code[0]);

            $this->_country = $code[1];
            $this->setCountry($code[1]);    
            return [
                'country' => $this->_country,
                'language' => $this->_language
            ];
        }

        // 일치하는 로케일값이 없는경우
        return NULL;
    }

    public function check($code)
    {
        if ( $this->isCountry($code) ) {
            $this->setCountry($code);
            return "country";
        } else if ( $this->isLanguage($code) ) {
            $this->setLanguage($code);
            return "language";
        }

        return false;
    }

    /**
     * 
     */
}