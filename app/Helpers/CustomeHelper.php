<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

function set_active($uri, $output = 'active')
{
    if( is_array($uri) ) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)){
            return $output;
        }
    }
}

function setActive(string $path, string $class_name = "active")
{
    return Request::path() === $path ? $class_name : "";
}

function setActiveBySegments(string $path, string $class_name = "active")
{
    $request_path = implode('/', Request::segments());
    
    return $request_path === $path ? $class_name : "";
}