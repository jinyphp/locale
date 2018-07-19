<?php
namespace Jiny\Locale;

use \Jiny\Core\Registry\Registry;

class Locale
{
    private $App;

    public $_country, $_language, $_culture;

    use Country, Language, Culture;

    public function __construct($app=NULL)
    {
        \TimeLog::set(__CLASS__."가 생성이 되었습니다.");    
        //echo __CLASS__."를 생성하였습니다.";  
        if ($app) {
            $this->App = $app;
        }     
    }

    public function parser($urls)
    {
        // \TimeLog::set(__METHOD__);
        if ( $this->isCountry($urls[0]) ) {
            $this->setCountry($urls[0]);
            return TRUE;

        } else if ( $this->isLanguage($urls[0]) ) {
            $this->_Language = $urls[0];
            $this->setLanguage($urls[0]);
            return TRUE;

        } else if ( $this->isCulture($urls[0]) ) {
            $code = explode("-",$urls[0]);                    
            $this->_Language = $code[0];
            $this->setLanguage($code[0]);

            $this->_Country = $code[1];
            $this->setCountry($code[1]);    
            return TRUE;
        }
        
    }



    /**
     * 
     */
}