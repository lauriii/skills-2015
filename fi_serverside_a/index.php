<?php

require 'src/Request.php';
require 'src/RendererInterface.php';
require 'src/Renderer.php';
require 'src/Kernel.php';
require 'src/Controller/GameController.php';
require 'src/TicTacToe/Manager.php';


use Game\Request;
use Game\Kernel;

global $app_dir;
$app_dir = __DIR__;

session_start();

$request = new Request();
$request->buildFromGlobals();

$kernel = new Kernel();
print $kernel->handle($request);
