<?php


namespace Shell\System;

class Response
{

    
    public function __construct() {}


    /**
    *   Outputs un-formatted message.
    *
    *   @return Response
    */
    public function outputSimple($output)
    {
        $this->_print($output);
    }


    /**
    *   Outputs formatted error messages.
    *
    *   @return Response
    */
    public function outputError($output)
    {
        $this->_print($output);
    }


    /**
    *   Specified output command for when No Command has been passed to the engine.
    *
    *   @return Response
    */
    public function outputNoCommandPassed($output = 'Please pass a command to the CLI.')
    {
        $this->_print($output);
    }


    /**
    *   Specified output message for when Command doesn't exist.
    *
    *   @return Response
    */
    public function outputCommandDoesntExist($command)
    {
        $this->_print("Command '" . $command . "' cannot be found :(");
    }


    /**
    *   Specified output message for when Command is not valid.
    *
    *   @var \Shell\System\Response
    */
    public function outputInvalidCommand($command)
    {
        $this->_print("Command '" . $command . "' is not valid :(");
    }


    /**
    *   Outputs a string on the screen.
    *
    *   @return Response
    */
    private function _print($output)
    {
        if ($output === '') $this->_exception();

        echo $output . PHP_EOL;

        die();
    }


    /**
    *   Throw exception.
    *
    *   @return Response
    */
    private function _exception($output = 'No output passed.')
    {
        throw new ResponseException($output, 1);

        die();
    }

}