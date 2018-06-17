<?php
namespace Jiny\Locale;

class Locale
{
    private $Application;

    use Country, Language, Culture;

    public function __construct($app)
    {
        // \TimeLog::set(__CLASS__."가 생성이 되었습니다.");
        $this->Application = $app;

    }

}