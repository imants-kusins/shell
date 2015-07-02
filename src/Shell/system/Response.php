<?php


namespace Shell\System;

class Response
{

    
    public function __construct() {}


    public function outputSimple($output)
    {
        $this->_print($output);
    }


    public function outputError($output)
    {
        $this->_print($output);
    }


    public function outputNoCommandPassed($output = 'Please pass a command to the CLI.')
    {
        $this->_print($output);
    }


    public function outputCommandDoesntExist($command)
    {
        $this->_print("Command '" . $command . "' cannot be found :(");
    }


    private function _print($output)
    {
        if ($output === '') $this->_exception();

        echo $output . PHP_EOL;

        die();
    }


    private function _exception($output = 'No output passed.')
    {
        throw new ResponseException($output, 1);

        die();
    }

}