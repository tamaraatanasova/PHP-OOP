<?php

namespace Registration\Classes;

class Redirect
{
    public static function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }
}
