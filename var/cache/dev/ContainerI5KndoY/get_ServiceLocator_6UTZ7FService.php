<?php

namespace ContainerI5KndoY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_6UTZ7FService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.6UTZ_7F' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.6UTZ_7F'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\FirmaController::POST_GET_FIRMA_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\PunkteController::GET_Punkte_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\QrcodeController::Add_QrCode_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\RabattController::GET_Rabatt_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\StandortController::GET_Betrieb_From_Firma_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\StandortController::POST_GET_FIRMA_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\UserController::Login_User_API' => ['privates', '.service_locator.Q90h4E1', 'get_ServiceLocator_Q90h4E1Service', true],
            'App\\Controller\\UserController::POST_GET_User_API' => ['privates', '.service_locator.Q90h4E1', 'get_ServiceLocator_Q90h4E1Service', true],
            'App\\Controller\\UserRabattController::GET_Userrabatte_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\UserRabattController::Use_Userrabatte_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'App\\Controller\\FirmaController:POST_GET_FIRMA_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\PunkteController:GET_Punkte_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\QrcodeController:Add_QrCode_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\RabattController:GET_Rabatt_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\StandortController:GET_Betrieb_From_Firma_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\StandortController:POST_GET_FIRMA_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\UserController:Login_User_API' => ['privates', '.service_locator.Q90h4E1', 'get_ServiceLocator_Q90h4E1Service', true],
            'App\\Controller\\UserController:POST_GET_User_API' => ['privates', '.service_locator.Q90h4E1', 'get_ServiceLocator_Q90h4E1Service', true],
            'App\\Controller\\UserRabattController:GET_Userrabatte_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'App\\Controller\\UserRabattController:Use_Userrabatte_API' => ['privates', '.service_locator.9wplPMA', 'get_ServiceLocator_9wplPMAService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
        ], [
            'App\\Controller\\FirmaController::POST_GET_FIRMA_API' => '?',
            'App\\Controller\\PunkteController::GET_Punkte_API' => '?',
            'App\\Controller\\QrcodeController::Add_QrCode_API' => '?',
            'App\\Controller\\RabattController::GET_Rabatt_API' => '?',
            'App\\Controller\\StandortController::GET_Betrieb_From_Firma_API' => '?',
            'App\\Controller\\StandortController::POST_GET_FIRMA_API' => '?',
            'App\\Controller\\UserController::Login_User_API' => '?',
            'App\\Controller\\UserController::POST_GET_User_API' => '?',
            'App\\Controller\\UserRabattController::GET_Userrabatte_API' => '?',
            'App\\Controller\\UserRabattController::Use_Userrabatte_API' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::terminate' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'kernel::terminate' => '?',
            'App\\Controller\\FirmaController:POST_GET_FIRMA_API' => '?',
            'App\\Controller\\PunkteController:GET_Punkte_API' => '?',
            'App\\Controller\\QrcodeController:Add_QrCode_API' => '?',
            'App\\Controller\\RabattController:GET_Rabatt_API' => '?',
            'App\\Controller\\StandortController:GET_Betrieb_From_Firma_API' => '?',
            'App\\Controller\\StandortController:POST_GET_FIRMA_API' => '?',
            'App\\Controller\\UserController:Login_User_API' => '?',
            'App\\Controller\\UserController:POST_GET_User_API' => '?',
            'App\\Controller\\UserRabattController:GET_Userrabatte_API' => '?',
            'App\\Controller\\UserRabattController:Use_Userrabatte_API' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:terminate' => '?',
        ]);
    }
}
