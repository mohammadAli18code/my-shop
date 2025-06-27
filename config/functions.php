<?php

function protocol(){
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'] , 'https') == true ? 'https://' : 'http://';
    return $protocol;
}


function currentDomain(){
    return protocol() . $_SERVER['HTTP_HOST'];
}
// echo currentDomain();



function currentUrl(){
    return currentDomain() . $_SERVER['REQUEST_URI'];
}
// echo currentUrl();



function url($url){

    $domain = trim(CURRENT_DOMAIN , '/ ');
    $url = $domain . '/' . trim($url , '/ ');
    return $url;

}
// echo url('admin');

function asset($src){

    $domain = trim(CURRENT_DOMAIN , '/ ');
    $src = $domain . '/' . trim($src , '/ ');
    return $src;

}
// echo asset('admin');

function methodField(){
    return $_SERVER['REQUEST_METHOD'];
}

// echo method_field();

function displayError($displayError)
{

    if ($displayError) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }

}

// displayError(DISPLAY_ERROR);


global $flashMessage;
if(isset($_SESSION['flash_message'])){
    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}


function flash($name , $value = null){
    if($value === null){
        global $flashMessage;
        $message = isset($flashMessage[$name]) ? $flashMessage[$name] : '';
        return $message;
    }else{
        $_SESSION['flash_message'][$name] = $value;
    }
    

}
// echo flash('fff');
// flash('login_error' , 'please check your login form!');
// echo flash('login_error');


function dd($var){
    echo '<pre>';
    var_dump($var);
    exit;
}

// dd($_SERVER);


?>