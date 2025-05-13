<?php

namespace Template\Calsses;

class Redirector{
    public static function redirect($url){
        header('Location: '. $url);
        exit();
    }
}