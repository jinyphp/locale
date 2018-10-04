<?php

// $countrys = include "../country.php";
$arr = file_get_contents("country.json");
$arr = json_decode($arr, true);

foreach ($arr as $key => $value) {
    $key = strtolower($key);

    echo $key."\n";
    mkdir($key);

    print_r($value);
    $str = json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents("./$key/".$key.".json", $str);
}
