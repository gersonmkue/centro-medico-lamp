<?php

return [

    'login' => [
        'controller' => 'AuthController',
        'method' => 'loginView'
    ],

    'register' => [
        'controller' => 'AuthController',
        'method' => 'registerView'
    ],

    'patients' => [
        'controller' => 'PatientController',
        'method' => 'index'
    ],

    'dashboard' => [
        'controller' => 'PatientController',
        'method' => 'dashboard'
    ],

    'logout' => [
        'controller' => 'AuthController',
        'method' => 'logout'
    ]
];
