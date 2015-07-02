<?php


namespace Shell\Commands;

class Commander
{

    protected $_allAvailableCommands;

    public function __construct() {}

    public function commandExists($command)
    {
       $this->_allAvailableCommands = $this->_grabAvailableCommands();
    }

    private function _grabAvailableCommands()
    {
        if ( file_exists(__DIR__ . '\available.commands.php') )
        {
            require_once 'available.commands.php';
            dd($AVAILABLE_COMMANDS);
        } 
        else 
        {
            throw new Exception("available.commands.php file doesn't exist in " . __DIR__ . " directory!", 1);
            
        }
    }

}