<?php

require_once __DIR__."/vendor/autoload.php";
use App\Commands\DemoCommand;
use App\Commands\GreetCommand;
use App\Commands\ListCommand;
use App\Commands\TableCommand;
use Symfony\Component\Console\Application;


$app=new Application();
$app->add(new GreetCommand());
$app->add(new DemoCommand());
$app->add(new TableCommand());
$app->add(new ListCommand());


$app->run();