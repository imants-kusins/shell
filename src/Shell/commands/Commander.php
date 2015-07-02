<?php


namespace Shell\Commands;

class Commander
{

    protected $_allAvailableCommands;

    public function __construct() {

        // load up all the registered commands
        $this->_allAvailableCommands = $this->_grabAvailableCommands();

    }

    public function commandExists($command)
    {
       
       if ( ! array_key_exists($command, $this->_allAvailableCommands) ) return false;

       return true;

    }

    private function _grabAvailableCommands()
    {
        if ( file_exists(__DIR__ . '\available.commands.php') )
        {
            require_once 'available.commands.php';

            return $AVAILABLE_COMMANDS;
        } 
        else 
        {
            throw new Exception("available.commands.php file doesn't exist in " . __DIR__ . " directory!");
            
        }
    }

}