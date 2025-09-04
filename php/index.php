<?php

declare(strict_types=1);


use App\Enums\ContactActionEnum;
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

$requestedAction = filter_has_var(INPUT_GET, 'action')
    ? filter_input(INPUT_GET, 'action')
    : '';

$action = ContactActionEnum::tryFrom($requestedAction) ?? ContactActionEnum::List;


switch ($action) {
    case ContactActionEnum::List:
        $contacts = $contectRepository->findAll();
include __DIR__.'\templates\contacts\index.phtml';
break;
case ContactActionEnum::Edit:
        $id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);
        if (false === $id || null === $id) {
            redirect();
        }
        $contect = $contectRepository->findById($id);
        echo '<pre>'; print_r($contect).'</pre>';
        break;
    default:
        // do nothing
        break;
}


// echo '<pre>'; print_r($dbConfig).'</pre>';
// echo '<pre>'; print_r($res).'</pre>';
// echo  '<pre>'; print_r($contacts).'</pre>';