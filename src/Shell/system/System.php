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


    public function __construct()
    {
        $this->_response = new Response();

        $this->_commander = new Commander();
    }


    /**
    *   Attempt to run the requested command.
    *
    *   @return Response.
    */
    public function run($command)
    {
        $this->_command = $command;

        if ($this->_parseCommand()) {

            $this->_execute();

        } else  {

            $this->_fail();

        }
    }


    /**
    *   Checks if a command is passed, exists and is valid.
    *
    *   @return boolean
    */
    private function _parseCommand()
    {

        if ( ! $this->_commandHasBeenPassed() ) {

            $this->_response->outputNoCommandPassed();

        }

        if ( ! $this->_commandExists() ) {

            $this->_response->outputCommandDoesntExist($this->_command[1]);

        }

        if ( ! $this->_commandIsValid() ) {

            $this->_response->outputInvalidCommand($this->_command[1]);
            
        }

        return true;
    }


    /**
    *   Checks if the requested command is valid.
    *   By valid, I mean, has all the required paramters etc.
    *
    *   @return boolean 
    */
    private function _commandIsValid()
    {
        return $this->_commander->checkCommand($this->_command);
    }


    /**
    *   Checks if the requested command exists in the available.commands.file.php .
    *
    *   @return boolean
    */
    private function _commandExists()
    {
        return $this->_commander->commandExists($this->_command[1]);
    }


    /**
    *   Checks if a command has been passed / requested.
    *
    *   @return boolean
    */
    private function _commandHasBeenPassed()
    {
        if (count($this->_command) === 0) return false;

        return true;
    }


    /**
    *   Returns command request failure.
    *
    *   @return Response.
    */
    private function _fail()
    {
        echo $this->_command[1] . " command could not be executed!" . PHP_EOL;
        die();
    }

}