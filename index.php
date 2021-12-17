<?php
include 'Board.php';
include 'Robot.php';
include 'Simulator.php';
include 'Security.php';

use \Alshugairi\Board;
use \Alshugairi\Robot;
use \Alshugairi\Simulator;

$board = new Board(5, 5);
$robot = new Robot($board);
$simulator = new Simulator($robot);


$simulator->run('FFRFL');