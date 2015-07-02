<?php

namespace Shell\System;

class System
{

    protected $_command;

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
            $this->_output("Please pass a command to the CLI.");
        }

        // Verify if the command exists in the engine.
        if ( ! $this->_commandExists() ) {
            $this->_output("Command '" . $this->_command[1] . "' doesn't exist.");
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


    private function _output($outputString)
    {
        echo $outputString . PHP_EOL;
        die();
    }

    private function _fail()
    {
        echo $this->_command[1] . " command has not been found!" . PHP_EOL;
        die();
    }

}