<?php

/**
 * Created by PhpStorm.
 * User: berkan.sahin
 * Date: 10/23/2014
 * Time: 8:30 PM
 */

## Perma link ##
function permaLink($keyword){
    $keyword = str_replace(array("&quot;","&#39;"), NULL, $keyword);
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
    $do = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
    $perma = strtolower(str_replace($find, $do, $keyword));
    $perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
    $perma = trim(preg_replace('/\s+/',' ', $perma));
    $perma = str_replace(' ', '-', $perma);
    return $perma;
}
## Share Time ##
function shareTime($timer){
    //Different time
    $dif_time = time() -$timer;
    //Second
    $second  = $dif_time;
    $minute  = round($dif_time/60);
    $hour    = round($dif_time/3600);
    $day     = round($dif_time/86400);
    $week    = round($dif_time/604800);
    $month   = round($dif_time/2419200);
    $year    = round($dif_time/29030400);

    if($second <= 59){

        if($second == 0){
            return "Şimdi yazıldı.";
        }else{
            return $second." saniye önce";
        }

    }elseif($minute <= 59){
        return $minute. " dakika önce";
    }elseif($hour <= 23){
        return $hour ." saat önce";
    }elseif($day <= 6){
        return $day ." gün önce";
    }elseif($week <= 3){
        return $week ." hafta önce";
    }elseif($month <= 11){
        return $month . " ay önce";
    }else{
        return $year. " yıl önce";
    }
}

## Month Convert ##
function convertDay ($par){

    if($par == 1){
        return "Ocak";
    }else if($par == 2){
        return "Şubat";
    }else if($par == 3){
        return "Mart";
    }else if($par == 4){
        return "Nisan";
    }else if ($par == 5){
        return "Mayıs";
    }else if ($par == 6){
        return "Haziran";
    }else if ($par == 7){
        return "Temmuz";
    }else if ($par == 8){
        return "Ağustos";
    }else if ($par == 9){
        return "Eylül";
    }else if ($par == 10){
        return "Ekim";
    }else if ($par == 11){
        return "Kasım";
    }else if ($par == 12){
        return "Aralık";
    }else {
        return false;
    }

}

## All POST ##
function allPosts(){
    $ci =& get_instance();
    $array = array();
    foreach($_POST as $key => $value){
     $array[] = $ci->security->xss_clean($_POST[$key]);
    }
    return $array;
}

## All GET ##
function allGets(){
    $ci =& get_instance();
    $array = array();
    foreach($_GET as $key => $value){
        $array[] = $ci->security->xss_clean($_GET[$key]);
    }
    return $array;
}

## All FILES ##
function allFiles(){
    $ci =& get_instance();
    $array = array();
    foreach($_FILES as $key => $value){
        $array[] = $ci->security->xss_clean($_FILES[$key]);
    }
    return $array;
}

## All FILES ##
function allRequest(){
    $ci =& get_instance();
    $array = array();
    foreach($_REQUEST as $key => $value){
        $array[] = $ci->security->xss_clean($_REQUEST[$key]);
    }
    return $array;
}

## SQL Injection Filter ##
function cleanInjection($data,$type = ""){
    if($type){

        if($type == "mysql"){
            return mysql_real_escape_string($data);
        }else if($type == "mysqli"){
            #return mysqli_escape_string($data);
        }else if($type == "mssql"){
            #
        }

    }else{
        return mysql_real_escape_string($data);
    }

}




