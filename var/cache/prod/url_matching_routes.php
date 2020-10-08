<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/password' => [[['_route' => 'password', '_controller' => 'App\\Controller\\PasswordController::index'], null, null, null, false, false, null]],
        '/qrcode' => [[['_route' => 'qrcode', '_controller' => 'App\\Controller\\QrcodeController::index'], null, null, null, false, false, null]],
        '/qrcode/showAll' => [[['_route' => 'showAll_qrcodes', '_controller' => 'App\\Controller\\QrcodeController::showAll'], null, null, null, true, false, null]],
        '/qrcode/new' => [[['_route' => 'new_qrcode_form', '_controller' => 'App\\Controller\\QrcodeController::add'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'user', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/user/show}' => [[['_route' => 'show_user', '_controller' => 'App\\Controller\\UserController::showUser'], null, null, null, false, false, null]],
        '/user/new}' => [[['_route' => 'new_user_Form', '_controller' => 'App\\Controller\\UserController::addUser'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
    ],
    [ // $dynamicRoutes
    ],
    null, // $checkCondition
];
