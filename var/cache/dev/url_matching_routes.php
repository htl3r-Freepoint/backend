<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/design' => [[['_route' => 'design', '_controller' => 'App\\Controller\\DesignController::index'], null, null, null, false, false, null]],
        '/firma' => [[['_route' => 'firma', '_controller' => 'App\\Controller\\FirmaController::index'], null, null, null, false, false, null]],
        '/punkte' => [[['_route' => 'punkte', '_controller' => 'App\\Controller\\PunkteController::index'], null, null, null, false, false, null]],
        '/qrcode' => [[['_route' => 'qrcode', '_controller' => 'App\\Controller\\QrcodeController::index'], null, null, null, false, false, null]],
        '/qrcode/showAll' => [[['_route' => 'showAll_qrcodes', '_controller' => 'App\\Controller\\QrcodeController::showAll'], null, null, null, true, false, null]],
        '/qrcode/new' => [[['_route' => 'new_qrcode_form', '_controller' => 'App\\Controller\\QrcodeController::add'], null, null, null, false, false, null]],
        '/rabatt' => [[['_route' => 'rabatt', '_controller' => 'App\\Controller\\RabattController::index'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'user', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/user/show' => [[['_route' => 'show_user', '_controller' => 'App\\Controller\\UserController::showUser'], null, null, null, false, false, null]],
        '/user/new' => [[['_route' => 'new_user_Form', '_controller' => 'App\\Controller\\UserController::addUser'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api/(?'
                    .'|firma(?:\\.(html|json))?(*:200)'
                    .'|punkte/([^/\\.]++)(?:\\.(html|json|xml))?(*:247)'
                    .'|AddQrCode(?:\\.(html|json))?(*:282)'
                    .'|rabatt/([^/\\.]++)(?:\\.(html|json|xml))?(*:329)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        200 => [[['_route' => 'app_firma_post_get_firma_api', '_format' => 'html', '_controller' => 'App\\Controller\\FirmaController::POST_GET_FIRMA_API'], ['_format'], null, null, false, true, null]],
        247 => [[['_route' => 'show_punkte_json', '_format' => 'html', '_controller' => 'App\\Controller\\PunkteController::Punkte_API'], ['id', '_format'], null, null, false, true, null]],
        282 => [[['_route' => 'app_qrcode_add_qrcode_api', '_format' => 'html', '_controller' => 'App\\Controller\\QrcodeController::Add_QrCode_API'], ['_format'], null, null, false, true, null]],
        329 => [
            [['_route' => 'show_rabatt_json', '_format' => 'html', '_controller' => 'App\\Controller\\RabattController::Rabatt_API'], ['id', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
