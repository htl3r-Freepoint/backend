<?php

namespace ContainerQOJLoTi;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFirmaRepositoryService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Repository\FirmaRepository' shared autowired service.
     *
     * @return \App\Repository\FirmaRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Repository\\FirmaRepository'] = new \App\Repository\FirmaRepository(($container->services['doctrine'] ?? $container->getDoctrineService()));
    }
}
