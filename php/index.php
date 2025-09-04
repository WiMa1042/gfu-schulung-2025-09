<?php

declare(strict_types=1);

use App\Repositories\ContactRepository;

require_once realpath(__DIR__ ).'/src/autoloader.php';

$dbConfig = require dirname(__DIR__.'/..') . '/config/database.php';

$contectRepository = new ContactRepository();
$contectRepository->connection(
    $dbConfig['host'],
    $dbConfig['port'],
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['database'],
);

$contacts = $contectRepository->findAll();

echo '<pre>'; print_r($dbConfig).'</pre>';
//echo '<pre>'; print_r($res).'</pre>';
echo  '<pre>'; print_r($contacts).'</pre>';