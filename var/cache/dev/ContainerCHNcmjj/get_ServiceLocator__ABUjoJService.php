<?php

namespace ContainerCHNcmjj;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator__ABUjoJService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator..aBUjoJ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator..aBUjoJ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'firma' => ['privates', '.errored..service_locator..aBUjoJ.App\\Entity\\Firma', NULL, 'Cannot autowire service ".service_locator..aBUjoJ": it references class "App\\Entity\\Firma" but no such service exists.'],
            'serializer' => ['services', 'serializer', 'getSerializerService', true],
        ], [
            'firma' => 'App\\Entity\\Firma',
            'serializer' => '?',
        ]);
    }
}
