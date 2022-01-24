<?php
session_start();
date_default_timezone_set("America/Sao_Paulo");

define('DS', DIRECTORY_SEPARATOR);
define('DOMAIN', 'https://localhost/basecode/storage/examples');

require_once dirname(__DIR__).DS."vendor".DS."autoload.php";

use BaseCode\Storage\Storage;

// Storage::session()->set('name', 'coder');
// echo Storage::session()->get('name');
// Storage::session()->delete('name');

/* COOKIES */
$name = 'name';
$value = 'php';

// Storage::cookie()->expire('seconds', 10)->set($name, $value);
// $cookie = Storage::cookie()->get($name);

// print_r(Storage::cookie()->all());
// Storage::cookie()->destroy();

// if ($cookie) {
//     echo $cookie;
//     Storage::cookie()->delete($name);
// }
