#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
//..регистрируем команду
use Console\Command\RedisCommand;

$app = new Application();
$app->add(new RedisCommand());
$app->run();

