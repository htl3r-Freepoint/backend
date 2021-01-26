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
        '/firma' => [[['_route' => 'firma', '_controller' => 'App\\Controller\\FirmaController::index'], null, null, null, false, false, null]],
        '/api/VerifyCode' => [[['_route' => 'app_kasse_testinggrounds', '_format' => 'json', '_controller' => 'App\\Controller\\KasseController::TestingGrounds'], null, null, null, false, false, null]],
        '/qrcode' => [[['_route' => 'qrcode', '_controller' => 'App\\Controller\\QrcodeController::index'], null, null, null, false, false, null]],
        '/qrcode/new' => [[['_route' => 'new_qrcode_form', '_controller' => 'App\\Controller\\QrcodeController::saveCode'], null, null, null, false, false, null]],
        '/rabatt' => [[['_route' => 'rabatt', '_controller' => 'App\\Controller\\RabattController::saveRabatt'], null, null, null, false, false, null]],
        '/standort' => [[['_route' => 'standort', '_controller' => 'App\\Controller\\StandortController::index'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'user', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/verify' => [[['_route' => 'app_verify_verify_user', '_controller' => 'App\\Controller\\VerifyController::Verify_User'], null, null, null, true, false, null]],
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
                    .'|Save(?'
                        .'|Design(?:\\.(html|json))?(*:208)'
                        .'|Rabatt(?:\\.(html|json))?(*:240)'
                        .'|Betrieb(?:\\.(html|json))?(*:273)'
                    .')'
                    .'|Get(?'
                        .'|Design(?:\\.(html|json))?(*:312)'
                        .'|Punkte(?:\\.(html|json))?(*:344)'
                        .'|Rabatt(?:\\.(html|json))?(*:376)'
                        .'|Betrieb(?:\\.(json))?(*:404)'
                        .'|Userrabatte(?:\\.(html|json))?(*:441)'
                    .')'
                    .'|firma(?:\\.(html|json))?(*:473)'
                    .'|AddQrCode(?:\\.(html|json))?(*:508)'
                    .'|sendMail(?:\\.(json))?(*:537)'
                    .'|RegisterUser(?:\\.(json))?(*:570)'
                    .'|loginUser(?:\\.(html|json))?(*:605)'
                    .'|UseUserrabatte(?:\\.(html|json))?(*:645)'
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
        208 => [[['_route' => 'app_design_save_design', '_format' => 'html', '_controller' => 'App\\Controller\\DesignController::Save_Design'], ['_format'], null, null, false, true, null]],
        240 => [[['_route' => 'app_rabatt_post_rabatt_api', '_format' => 'html', '_controller' => 'App\\Controller\\RabattController::POST_Rabatt_API'], ['_format'], null, null, false, true, null]],
        273 => [[['_route' => 'app_standort_post_get_firma_api', '_format' => 'html', '_controller' => 'App\\Controller\\StandortController::POST_GET_FIRMA_API'], ['_format'], null, null, false, true, null]],
        312 => [[['_route' => 'app_design_get_design', '_format' => 'html', '_controller' => 'App\\Controller\\DesignController::GET_Design'], ['_format'], null, null, false, true, null]],
        344 => [[['_route' => 'app_punkte_get_punkte_api', '_format' => 'html', '_controller' => 'App\\Controller\\PunkteController::GET_Punkte_API'], ['_format'], null, null, false, true, null]],
        376 => [[['_route' => 'app_rabatt_get_rabatt_api', '_format' => 'html', '_controller' => 'App\\Controller\\RabattController::GET_Rabatt_API'], ['_format'], null, null, false, true, null]],
        404 => [[['_route' => 'app_standort_get_betrieb_from_firma_api', '_format' => 'html', '_controller' => 'App\\Controller\\StandortController::GET_Betrieb_From_Firma_API'], ['_format'], null, null, false, true, null]],
        441 => [[['_route' => 'app_userrabatt_get_userrabatte_api', '_format' => 'html', '_controller' => 'App\\Controller\\UserRabattController::GET_Userrabatte_API'], ['_format'], null, null, false, true, null]],
        473 => [[['_route' => 'app_firma_post_get_firma_api', '_format' => 'html', '_controller' => 'App\\Controller\\FirmaController::POST_GET_FIRMA_API'], ['_format'], null, null, false, true, null]],
        508 => [[['_route' => 'app_qrcode_add_qrcode_api', '_format' => 'html', '_controller' => 'App\\Controller\\QrcodeController::Add_QrCode_API'], ['_format'], null, null, false, true, null]],
        537 => [[['_route' => 'app_user_sendmail', '_format' => 'json', '_controller' => 'App\\Controller\\UserController::sendMail'], ['_format'], null, null, false, true, null]],
        570 => [[['_route' => 'app_user_post_get_user_api', '_format' => 'json', '_controller' => 'App\\Controller\\UserController::POST_GET_User_API'], ['_format'], null, null, false, true, null]],
        605 => [[['_route' => 'app_user_login_user_api', '_format' => 'html', '_controller' => 'App\\Controller\\UserController::Login_User_API'], ['_format'], null, null, false, true, null]],
        645 => [
            [['_route' => 'app_userrabatt_use_userrabatte_api', '_format' => 'html', '_controller' => 'App\\Controller\\UserRabattController::Use_Userrabatte_API'], ['_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
