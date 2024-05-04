<?php

if(!function_exists("country")) {
    function xSelectCountry($name=null,$value=null) {
        $select = new \Jiny\Html\Form\CSelect($name, $value);
        $select->setValue($value);

        foreach(config("locale.country") as $key => $item) {
            $select->addOption($item['en'], $key);
        }
        return $select;
    }
}

