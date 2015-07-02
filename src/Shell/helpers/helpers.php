<?php

if ( ! function_exists('dd') )
{
    /**
    *   Die and Dump helper function.
    *
    *   @return Array Dump
    */
    function dd($array)
    {
        die( var_dump($array) );
    }
}