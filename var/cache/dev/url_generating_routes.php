<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'app_design_save_design' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\DesignController::Save_Design'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/SaveDesign']], [], []],
    'app_design_get_design' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\DesignController::GET_Design'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/GetDesign']], [], []],
    'firma' => [[], ['_controller' => 'App\\Controller\\FirmaController::index'], [], [['text', '/firma']], [], []],
    'app_firma_post_get_firma_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\FirmaController::POST_GET_FIRMA_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/firma']], [], []],
    'app_kasse_testinggrounds' => [[], ['_format' => 'json', '_controller' => 'App\\Controller\\KasseController::TestingGrounds'], ['_format' => 'html|json'], [['text', '/api/VerifyCode']], [], []],
    'app_punkte_get_punkte_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\PunkteController::GET_Punkte_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/GetPunkte']], [], []],
    'qrcode' => [[], ['_controller' => 'App\\Controller\\QrcodeController::index'], [], [['text', '/qrcode']], [], []],
    'new_qrcode_form' => [[], ['_controller' => 'App\\Controller\\QrcodeController::saveCode'], [], [['text', '/qrcode/new']], [], []],
    'app_qrcode_add_qrcode_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\QrcodeController::Add_QrCode_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/AddQrCode']], [], []],
    'rabatt' => [[], ['_controller' => 'App\\Controller\\RabattController::saveRabatt'], [], [['text', '/rabatt']], [], []],
    'app_rabatt_get_rabatt_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\RabattController::GET_Rabatt_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/GetRabatt']], [], []],
    'app_rabatt_post_rabatt_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\RabattController::POST_Rabatt_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/SaveRabatt']], [], []],
    'standort' => [[], ['_controller' => 'App\\Controller\\StandortController::index'], [], [['text', '/standort']], [], []],
    'app_standort_post_get_firma_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\StandortController::POST_GET_FIRMA_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/SaveBetrieb']], [], []],
    'app_standort_get_betrieb_from_firma_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\StandortController::GET_Betrieb_From_Firma_API'], ['_format' => 'json'], [['variable', '.', 'json', '_format', true], ['text', '/api/GetBetrieb']], [], []],
    'user' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/user']], [], []],
    'app_user_sendmail' => [['_format'], ['_format' => 'json', '_controller' => 'App\\Controller\\UserController::sendMail'], ['_format' => 'json'], [['variable', '.', 'json', '_format', true], ['text', '/api/sendMail']], [], []],
    'app_user_post_get_user_api' => [['_format'], ['_format' => 'json', '_controller' => 'App\\Controller\\UserController::POST_GET_User_API'], ['_format' => 'json'], [['variable', '.', 'json', '_format', true], ['text', '/api/RegisterUser']], [], []],
    'app_user_login_user_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\UserController::Login_User_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/loginUser']], [], []],
    'app_userrabatt_get_userrabatte_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\UserRabattController::GET_Userrabatte_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/GetUserrabatte']], [], []],
    'app_userrabatt_use_userrabatte_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\UserRabattController::Use_Userrabatte_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/UseUserrabatte']], [], []],
    'app_verify_verify_user' => [[], ['_controller' => 'App\\Controller\\VerifyController::Verify_User'], [], [['text', '/verify/']], [], []],
];
