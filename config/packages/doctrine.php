<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension(
        'doctrine',
        [
            'dbal' => [
                'default_connection' => 'default',
                'connections'        => [
                    'default' => [
                        'driver'                => 'pdo_mysql',
                        'host'                  => '%env(resolve:MYSQL_HOST)%',
                        'port'                  => '%env(resolve:MYSQL_PORT)%',
                        'user'                  => '%env(resolve:MYSQL_USER)%',
                        'password'              => '%env(resolve:MYSQL_PASSWORD)%',
                        'server_version'        => '8.4.1',
                        'charset'               => 'utf8mb4',
                        'default_table_options' => [
                            'charset' => 'utf8mb4',
                            'collate' => 'utf8mb4_unicode_ci',
                        ],
                    ],
                ],
            ],
            'orm'  => [
                'default_entity_manager'      => 'default',
                'auto_generate_proxy_classes' => true,
                'entity_managers'             => [
                    'default' => [
                        'connection' => 'default',
                        'naming_strategy' => 'doctrine.orm.naming_strategy.underscore',
                        'mappings' => [
                            'App' => [
                                'is_bundle' => false,
                                'type'      => 'attribute',
                                'dir'       => '%kernel.project_dir%/src/Infrastructure/Persistence/Entity',
                                'prefix'    => 'App\Infrastructure\Persistence\Entity',
                                'alias'     => 'AppMysql',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    );
};