<?php

/**
 * @author BaBeuloula <babeuloula@gmail.com>
 * @copyright Copyright (c) BaBeuloula
 * @license MIT
 */

declare(strict_types=1);

namespace BaBeuloula\AdjacentDepartments\Bridge\AdjacentDepartmentsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AdjacentDepartmentsExtension extends Extension
{
    // phpcs:ignore
    public function load(array $config, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yml');
    }
}
