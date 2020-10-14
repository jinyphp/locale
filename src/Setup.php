<?php
namespace Jiny\Locale;

class Setup
{
    public function postPackageInstall()
    {
        mkdir("./locale");
    }
}