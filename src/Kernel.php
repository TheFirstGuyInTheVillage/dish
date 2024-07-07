<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('../config/{packages}/*.php');
        $container->import('../config/{packages}/' . $this->environment . '/*.php');

        $servicesPath = dirname(__DIR__) . '/config/services.php';
        if (is_file($servicesPath)) {
            (require $servicesPath)($container->withPath($servicesPath), $this);
        }
        $envServicesPath = dirname(__DIR__) . '/config/services_' . $this->environment . '.php';
        if (is_file($envServicesPath)) {
            (require $envServicesPath)($container->withPath($envServicesPath), $this);
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('../config/routes/api.php');
    }
}
