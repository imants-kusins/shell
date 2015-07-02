<?php

namespace Shell\Commands\Help;

use Shell\System\Response as Response;

class Help
{

    protected $_response;

    public function __construct()
    {

        $this->_response = new Response();

    }

    public function fail()
    {
        die("Fail it all!");
    }
}