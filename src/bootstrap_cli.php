<?php

use Commands\DomainTestsExecution;
use Commands\FillDummyData;
use Commands\GenerateInternalMetadata;
use Symfony\Component\Console\Application;

global $container;

$application = new Application();
$application->add(new GenerateInternalMetadata());
$application->add(new FillDummyData($container->get('auth.encoder')));
$application->add(new DomainTestsExecution($container));
$application->run();