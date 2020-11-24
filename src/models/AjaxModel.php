<?php

namespace goldenFeathers\hw4\src\models;


$swapped = json_decode(file_get_contents('php://input'));
$active = fopen("../resources/active_image.txt", 'r' );
$arr = unserialize(fread($active, filesize("../resources/active_image.txt")));
fclose($active);
$active = fopen("../resources/active_image.txt", 'w' );
if (flock($active, LOCK_EX)){
    file_put_contents("./test.txt", serialize($arr));
    $temp = $arr[$swapped[0]];
    $arr[$swapped[0]] = $arr[$swapped[1]];
    $arr[$swapped[1]] = $temp;
    fwrite($active, serialize($arr));
    fflush($active);
    flock($active, LOCK_UN);
}
fclose($active);