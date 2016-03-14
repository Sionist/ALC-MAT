<?php
function verificar(){
    $uri = $_SERVER['REQUEST_URI'];
    $url = "/sistenomialc/";

    if($uri != $url){
        return false;
    }
}





