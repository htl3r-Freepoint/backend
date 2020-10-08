<?php

namespace ContainerQOJLoTi;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Orm_DefaultEntityManagerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'doctrine.orm.default_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = new \Doctrine\ORM\Configuration();

        $b = new \Symfony\Component\Cache\DoctrineProvider(($container->privates['doctrine.system_cache_pool'] ?? $container->load('getDoctrine_SystemCachePoolService')));
        $c = new \Doctrine\Persistence\Mapping\Driver\MappingDriverChain();
        $c->addDriver(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(($container->privates['annotations.cached_reader'] ?? $container->getAnnotations_CachedReaderService()), [0 => (\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Entity')]), 'App\\Entity');

        $a->setEntityNamespaces(['App' => 'App\\Entity']);
        $a->setMetadataCacheImpl($b);
        $a->setQueryCacheImpl($b);
        $a->setResultCacheImpl(new \Symfony\Component\Cache\DoctrineProvider(($container->privates['doctrine.result_cache_pool'] ?? $container->load('getDoctrine_ResultCachePoolService'))));
        $a->setMetadataDriverImpl($c);
        $a->setProxyDir(($container->targetDir.''.'/doctrine/orm/Proxies'));
        $a->setProxyNamespace('Proxies');
        $a->setAutoGenerateProxyClasses(false);
        $a->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $a->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $a->setNamingStrategy(new \Doctrine\ORM\Mapping\UnderscoreNamingStrategy(0, true));
        $a->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $a->setEntityListenerResolver(new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver($container));
        $a->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Repository\\AngestellteRepository' => ['privates', 'App\\Repository\\AngestellteRepository', 'getAngestellteRepositoryService', true],
            'App\\Repository\\BetriebRepository' => ['privates', 'App\\Repository\\BetriebRepository', 'getBetriebRepositoryService', true],
            'App\\Repository\\DesignRepository' => ['privates', 'App\\Repository\\DesignRepository', 'getDesignRepositoryService', true],
            'App\\Repository\\DesignZuweisungRepository' => ['privates', 'App\\Repository\\DesignZuweisungRepository', 'getDesignZuweisungRepositoryService', true],
            'App\\Repository\\FirmaRepository' => ['privates', 'App\\Repository\\FirmaRepository', 'getFirmaRepositoryService', true],
            'App\\Repository\\PasswordRepository' => ['privates', 'App\\Repository\\PasswordRepository', 'getPasswordRepositoryService', true],
            'App\\Repository\\PunkteRepository' => ['privates', 'App\\Repository\\PunkteRepository', 'getPunkteRepositoryService', true],
            'App\\Repository\\QrcodeRepository' => ['privates', 'App\\Repository\\QrcodeRepository', 'getQrcodeRepositoryService', true],
            'App\\Repository\\RabattRepository' => ['privates', 'App\\Repository\\RabattRepository', 'getRabattRepositoryService', true],
            'App\\Repository\\UserRabatteRepository' => ['privates', 'App\\Repository\\UserRabatteRepository', 'getUserRabatteRepositoryService', true],
            'App\\Repository\\UserRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'App\\Repository\\AngestellteRepository' => '?',
            'App\\Repository\\BetriebRepository' => '?',
            'App\\Repository\\DesignRepository' => '?',
            'App\\Repository\\DesignZuweisungRepository' => '?',
            'App\\Repository\\FirmaRepository' => '?',
            'App\\Repository\\PasswordRepository' => '?',
            'App\\Repository\\PunkteRepository' => '?',
            'App\\Repository\\QrcodeRepository' => '?',
            'App\\Repository\\RabattRepository' => '?',
            'App\\Repository\\UserRabatteRepository' => '?',
            'App\\Repository\\UserRepository' => '?',
        ])));

        $container->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create(($container->services['doctrine.dbal.default_connection'] ?? $container->load('getDoctrine_Dbal_DefaultConnectionService')), $a);

        (new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []))->configure($instance);

        return $instance;
    }
}
