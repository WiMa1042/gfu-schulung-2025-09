<?php

declare(strict_types=1);

$srcDir = realpath(__DIR__).'/src/';

require $srcDir . 'Interfaces/Repositories/ContactsRepositoryInterface.php';
require $srcDir . 'Repositories/Traits/HasDatabaseConnection.php';
require $srcDir . 'Repositories/ContactRepository.php';


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