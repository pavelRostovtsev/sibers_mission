<?php

return [
	'' => [
	    'controller' => 'user',
        'action' => 'index',
    ],
    'user/index/{page:\d+}' => [
        'controller' => 'user',
        'action' => 'index',
    ],
    'user/create' => [
        'controller' => 'user',
        'action' => 'create',
    ],
    'user/store' => [
        'controller' => 'user',
        'action' => 'store',
    ],
    'user/show/{id:\d+}' => [
        'controller' => 'user',
        'action' => 'show',
    ],
    'user/edit/{id:\d+}' => [
        'controller' => 'user',
        'action' => 'edit',
    ],
    'user/update/{id:\d+}' => [
        'controller' => 'user',
        'action' => 'update',
    ],
    'user/destroy/{id:\d+}' => [
        'controller' => 'user',
        'action' => 'destroy',
    ],
    'admin/sign-in' => [
        'controller' => 'admin',
        'action' => 'signIn',
    ],
    'admin/authorization' => [
        'controller' => 'admin',
        'action' => 'authorization',
    ],

];