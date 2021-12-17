<?php

namespace Alshugairi;

use InvalidArgumentException;

class Robot
{
    const METHOD_MOVE   = 'MOVE';

    protected $board;
    protected $security;
    protected $x;
    protected $y;
    protected $commandsX;
    protected $commandsY;

    public function __construct(Board $board)
    {
        $this->board = $board;
        $this->security  = new Security();
        $this->commandsX = ['R' => 1, 'L' => -1, ];
        $this->commandsY = ['F' => 1, 'B' => 1 ];
    }

    public function execute($command, $method)
    {
        extract($this->parseCommand($command));
        if (!in_array($method, self::getMethods())) return;
        switch ($method) {
            case self::METHOD_MOVE:
                $this->move($x,$y);
                break;
        }

        echo "X=> $this->x,Y=> $this->y <br>";
    }

    protected function parseCommand($command)
    {
        $x = 0;
        $y = 0;
        if ($this->security->scan($command, $this->commandsX)) {
            $x = $this->commandsX[$command];
        }elseif ($this->security->scan($command, $this->commandsY)) {
            $y = $this->commandsY[$command];
        }
        return compact('x', 'y');
    }

    public function move($x,$y)
    {
        $x = $this->x + $x;
        $y = $this->y + $y;
        // Check if new x,y coordinates within board bounds
        if (! $this->board->withinBounds($x, $y)) return;

        // Set robot position
        $this->x = $x;
        $this->y = $y;
    }

    protected function getMethods()
    {
        $methods = [
            self::METHOD_MOVE,
        ];
        return $methods;
    }

    protected function setCommand($command , $value, $type)
    {
        if ($type == 'x' && $this->security->check($command, $value, $this->commandsX, $this->commandsY)) {
            $this->commandsX[$command] = $value;
        } elseif ($type == 'y' && $this->security->check($command, $value, $this->commandsX, $this->commandsY)) {
            $this->commandsY[$command] = $value;
        }
    }
}