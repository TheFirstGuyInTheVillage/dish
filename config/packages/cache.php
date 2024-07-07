<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator) {
    $containerConfigurator->extension(
        'framework',
        [
            'cache' => [
                'app'    => 'cache.adapter.filesystem',
                'system' => 'cache.adapter.system',
            ],
        ],
    );
};