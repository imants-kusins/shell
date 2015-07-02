<?php

namespace Shell\System;

use Shell\System\Response as Response;
use Shell\Commands\Commander as Commander;

class System
{

    /**
    *   Response instance.
    *
    *   @var \Shell\System\Response
    */
    private $_response;


    /**
    *   Commander instance.
    *
    *   @var \Shell\Commands\Commander
    */
    private $_commander;


    /**
    *   User input command.
    *
    *   @var \Shell\System
    */
    protected $_command;


    /**
    *   Response instance.
    *
    *   @var \Shell\System\Response
    */
    public function __construct()
    {
        $this->_response = new Response();
    }


    /**
    *   Response instance.
    *
    *   @var \Shell\System\Response
    */
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


    /**
    *   Response instance.
    *
    *   @var \Shell\System\Response
    */
    private function _parseCommand()
    {

        if ( ! $this->_commandHasBeenPassed() ) {
            $this->_response->outputNoCommandPassed();
        }

        if ( ! $this->_commandExists() ) {
            $this->_response->outputCommandDoesntExist($this->_command[1]);
        }

        return true;
    }


    /**
    *   Response instance.
    *
    *   @var \Shell\System\Response
    */
    private function _commandExists()
    {

        $this->_commander = new Commander();

        return $this->_commander->commandExists($this->_command[1]);
    }


    /**
    *   Response instance.
    *
    *   @var \Shell\System\Response
    */
    private function _commandHasBeenPassed()
    {
        if (count($this->_command) === 0) return false;

        return true;
    }


    /**
    *   Response instance.
    *
    *   @var \Shell\System\Response
    */
    private function _fail()
    {
        echo $this->_command[1] . " command has not been found!" . PHP_EOL;
        die();
    }

}