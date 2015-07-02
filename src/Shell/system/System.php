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
        if (count($this->_command) === 0) {
            $this->_output("Please pass a command to the CLI.");
        }

        return true;
    }



    private function _output($outputString)
    {
        echo $outputString . PHP_EOL;
        die();
    }

    private function _fail()
    {
        echo "Such command has not been found!" . PHP_EOL;
        die();
    }

}