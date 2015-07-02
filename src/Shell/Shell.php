<?php


namespace Shell;

use Shell\System as System;


class Shell
{

    /**
    *   System instance.
    *
    *   @var \Shell\System
    */
    protected $_system;
    

    /**
    *   Create the system and attempt to run the requested command.
    *
    *   @return Response.
    */
    public function __construct($command = [])
    {
        $this->_system = new System\System();
        $this->_system->run($command);
    }

}