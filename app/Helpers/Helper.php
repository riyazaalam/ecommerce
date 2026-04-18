<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('user')) {

    function user()
    {
        return Auth::user();
    }
}

if (!function_exists('isAdmin')) {

    function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }
}

if (!function_exists('isCustomer')) {

    function isCustomer()
    {
        return Auth::check() && Auth::user()->role === 'customer';
    }
}

if (!function_exists('full_name')) {

    function full_name()
    {
        return Auth::user() 
            ? Auth::user()->first_name . ' ' . Auth::user()->last_name 
            : null;
    }
}
function getNavBarToggle($user){
   $status = 'nav-collapsed';
    if(isset($user)){
        if($user->sidebar_toggle == 1){
            $status = 'pace-done menu-expanded';
            
        }
    }
   
    return $status;
}