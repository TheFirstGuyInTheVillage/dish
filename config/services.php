<?php

declare(strict_types=1);

use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()
        ->autowire()
        ->autoconfigure()
        ->bind('$mysqlEntityManager', service('doctrine.orm.default_entity_manager'));

    $services->instanceof(Command::class)->tag('app.console.command');
};
