<?php
namespace Jiny\Locale;

class Locale
{
    private $Application;

    use Country, Language, Culture;

    public function __construct($app)
    {
        echo __CLASS__."를 생성합니다.<br>";
        $this->Application = $app;

    }

}