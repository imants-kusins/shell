<?php

if ( ! function_exists('dd') )
{
    function dd($array)
    {
        die(var_dump($array));
    }
}