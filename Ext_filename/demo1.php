<?php
/**
 * 利用explode   使用一个字符串分割另一个字符串
 * 利用. 分割文件名  
 * 然后截取 数组中的最后一个值
 * @param String 需要截取后缀名的文件名
 * @return  String 后缀名
 * 
 */

function getExt1($file_name){
    $arr = explode('.',$file_name);
    $length = count($arr);
    return $arr[$length-1];
}

function getExt2($file_name){
    $arr = explode('.',$file_name);
    return end($arr);
}

function getExt3($file_name){
    $arr = strrchr($file_name,'.');
    $arr = trim($arr,'.');
    return $arr;
}

function getExt4($file_name){
    $arr = strrpos($file_name,'.');
    $arr = substr($file_name,$arr+1);
    return $arr;
}

// array(4) { ["dirname"]=> string(1) "." ["basename"]=> string(22) "asd.das.dasd.edfas.mp3" ["extension"]=> string(3) "mp3" ["filename"]=> string(18) "asd.das.dasd.edfas" }
function getExt5($file_name){
    $arr = pathinfo($file_name);
    $arr = $arr['extension'];
    return $arr;
}

// 5.3以上可以用
function getExt6($file_name){
    $arr = strrev($file_name);
    $arr = strstr($arr,'.',true);
    $arr = strrev($arr);
    return $arr;
}

$name = 'asd.das.dasd.edfas.mp4';
$a = getExt5($name);
// var_dump($a) ;
echo $a;