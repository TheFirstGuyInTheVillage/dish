<?php

declare(strict_types=1);

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routingConfigurator): void
{
    $routingConfigurator
        ->import('../../src/Entrypoints/Controller/Api/V1/', 'annotation')
        ->prefix('/V1')
        ->namePrefix('api.v1.')
        ->locale('ru')
        ->format('json');
};