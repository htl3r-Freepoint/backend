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
    'design' => [[], ['_controller' => 'App\\Controller\\DesignController::index'], [], [['text', '/design']], [], []],
    'firma' => [[], ['_controller' => 'App\\Controller\\FirmaController::index'], [], [['text', '/firma']], [], []],
    'app_firma_post_get_firma_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\FirmaController::POST_GET_FIRMA_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/firma']], [], []],
    'punkte' => [[], ['_controller' => 'App\\Controller\\PunkteController::index'], [], [['text', '/punkte']], [], []],
    'show_punkte_json' => [['id', '_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\PunkteController::Punkte_API'], ['_format' => 'html|json|xml'], [['variable', '.', 'html|json|xml', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/api/punkte']], [], []],
    'qrcode' => [[], ['_controller' => 'App\\Controller\\QrcodeController::index'], [], [['text', '/qrcode']], [], []],
    'showAll_qrcodes' => [[], ['_controller' => 'App\\Controller\\QrcodeController::showAll'], [], [['text', '/qrcode/showAll/']], [], []],
    'new_qrcode_form' => [[], ['_controller' => 'App\\Controller\\QrcodeController::add'], [], [['text', '/qrcode/new']], [], []],
    'app_qrcode_add_qrcode_api' => [['_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\QrcodeController::Add_QrCode_API'], ['_format' => 'html|json'], [['variable', '.', 'html|json', '_format', true], ['text', '/api/AddQrCode']], [], []],
    'rabatt' => [[], ['_controller' => 'App\\Controller\\RabattController::index'], [], [['text', '/rabatt']], [], []],
    'show_rabatt_json' => [['id', '_format'], ['_format' => 'html', '_controller' => 'App\\Controller\\RabattController::Rabatt_API'], ['_format' => 'html|json|xml'], [['variable', '.', 'html|json|xml', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/api/rabatt']], [], []],
    'user' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/user']], [], []],
    'show_user' => [[], ['_controller' => 'App\\Controller\\UserController::showUser'], [], [['text', '/user/show']], [], []],
    'new_user_Form' => [[], ['_controller' => 'App\\Controller\\UserController::addUser'], [], [['text', '/user/new']], [], []],
];
