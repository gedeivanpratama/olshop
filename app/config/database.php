<?php

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'db_oldshop',
    'username'  => 'ivan',
    'password'  => 'ivanpkl2018',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();