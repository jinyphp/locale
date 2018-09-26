<?php
$countrys = include "../country.php";
foreach ($countrys as $key => $value) {
    echo $key."\n";
    // mkdir($key);

    print_r($value);
    $str = json_encode($value, JSON_PRETTY_PRINT);
    //file_put_contents("./$key/".$key.".json", $str);
}
