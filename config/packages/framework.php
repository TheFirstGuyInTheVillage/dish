<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension(
        'framework',
        [
            'secret'          => '%env(APP_SECRET)%',
            'session'         => [
                'storage_factory_id' => 'session.storage.factory.native',
                'enabled'            => true,
                'cookie_secure'      => 'auto',
                'cookie_lifetime'    => 3600,
            ],
            'php_errors'      => ['log' => true],
        ],
    );
};