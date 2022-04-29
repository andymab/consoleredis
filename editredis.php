#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

// ... регистрируем команды

$application->run();
$application->add(new GenerateAdminCommand());