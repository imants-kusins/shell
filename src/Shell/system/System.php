<?php

namespace Shell\System;

use \Shell\System\Response as Response;

class System
{

    private $_response;

    protected $_command;


    public function __construct()
    {
        $this->_response = new Response();
    }

    public function run($command)
    {
        $this->_command = $command;

        dd($this->_parseCommand());
        if ($this->_parseCommand())
        {
            $this->_execute();
        }
        else 
        {
            $this->_fail();
        }
    }


    private function _parseCommand()
    {

        if ( ! $this->_commandHasBeenPassed() ) {
            $this->_response->output("Please pass a command to the CLI.");
        }

        // Verify if the command exists in the engine.
        if ( ! $this->_commandExists() ) {
            $this->_response->output("Command '" . $this->_command[1] . "' doesn't exist.");
        }


        return true;
    }



    private function _commandExists()
    {
        return false;
    }


    private function _commandHasBeenPassed()
    {
        if (count($this->_command) === 0) return false;

        return true;
    }


    private function _fail()
    {
        echo $this->_command[1] . " command has not been found!" . PHP_EOL;
        die();
    }

}