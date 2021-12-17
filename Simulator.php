<?php

namespace Alshugairi;

class Simulator
{
    protected $robot;

    public function __construct(Robot $robot)
    {
        $this->robot = $robot;
    }

    public function run($commandsStr)
    {
        $commands = str_split($commandsStr);
        foreach ($commands as $command) {
            $this->robot->execute($command, 'MOVE');
        }

    }
}