<?php


namespace Shell;

use Shell\System as System;


class Shell
{
    protected $_system;
    
    public function __construct($command = [])
    {
        $this->_system = new System\System();
        $this->_system->run($command);
    }

}