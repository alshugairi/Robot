<?php

namespace Alshugairi;

class Security
{
    public function __construct()
    {
    }

    public function scan($command, $commandsList)
    {
        if (isset($commandsList[$command])) return true;
        return false;
    }

    public function check($command, $commandValue, $commandsX,$commandsY)
    {
        if (isset($commandsX[$command]) ||isset($commandsY[$command]) || !is_numeric($commandValue)) {
            return false;
        }
        return true;
    }
}