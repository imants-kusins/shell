<?php


namespace Shell\Commands;


class Commander
{

    /**
    *   All available commands storage property.
    *
    *   @var \Shell\Commands
    */
    protected $_allAvailableCommands;


    protected $_fullRequest;


    protected $_command;


    public function __construct()
    {

        // load up all the registered commands
        $this->_allAvailableCommands = $this->_grabAvailableCommands();

    }


    /**
    *   Check if the command exists in the command file.
    *
    *   @return boolean
    */
    public function commandExists($command)
    {
       
       if ( ! array_key_exists($command, $this->_allAvailableCommands) ) return false;

       return true;

    }


    /**
    *   Check if the command is valid.
    *
    *   @return boolean
    */
    public function checkCommand($command)
    {
        // set the full request to operate with afterwards
        $this->_fullRequest = $command;

        // set just the command for later user
        $this->_command = $command[1];

        if( $this->_allAvailableCommands[$this->_command]["required-param-count"] === $this->_checkCommandParameterCount() ) {
            return true;
        }

        return false;
    }


    private function _checkCommandParameterCount()
    {
        return count($this->_fullRequest) - 1;  // -1 to remove the command parameter.
    }


    /**
    *   Return available commands from file.
    *
    *   @return mixed
    */
    private function _grabAvailableCommands()
    {
        if ( file_exists(__DIR__ . '\available.commands.php') )
        {
            require_once 'available.commands.php';

            return $AVAILABLE_COMMANDS;
        } 
        else 
        {

            die("available.commands.php file doesn't exist in " . __DIR__ . " directory!");

        }
    }


    public function execute($command)
    {
        dd("Executing the command ! ");
    }

}