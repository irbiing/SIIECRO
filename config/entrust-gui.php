<?php
return [
    "layout" => "entrust-gui::app",
    "route-prefix" => "admin",
    "pagination" => [
        "users" => 15,
        "roles" => 15,
        "permissions" => 15,
    ],
    "middleware" => ['web', 'entrust-gui.admin'],
    "unauthorized-url" => '/login',
    "middleware-role" => 'admin',
    "confirmable" => false,
    "users" => [
      'fieldSearchable' => [],
    ],
];
