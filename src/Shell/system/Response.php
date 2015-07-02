<?php


namespace Shell\System;

class Response
{
    
    public function __construct()
    {
        // TODO
    }


    public function output($outputString)
    {
        echo $outputString . PHP_EOL;
        die();
    }

}