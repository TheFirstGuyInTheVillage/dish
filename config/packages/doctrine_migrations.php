<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension(
        'doctrine_migrations',
        [
            'em'               => 'default',
            'migrations_paths' => [
                'App\Infrastructure\Persistence\Migrations' =>
                    '%kernel.project_dir%/src/Infrastructure/Persistence/Migrations',
            ],
            'all_or_nothing'   => true,
        ],
    );
};