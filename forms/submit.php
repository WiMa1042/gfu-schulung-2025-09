<?php

declare(strict_types=1);
include_once 'functions.php';

if (! key_exists('submit', $_POST)) {
    redirect();
}

$errors=[];

$first_name = filter_input(INPUT_POST, 'vorname');
if('' === trim($first_name)) {
    $errors['first_name'] = 'Bitte geben Sie Ihren Vornamen an.';
}

$last_name = filter_input(INPUT_POST, 'nachname');
if('' === trim($last_name)) {
    $errors['last_name'] = 'Bitte geben Sie Ihren Nachnamen an.';
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (false === $email) {
    $errors['email'] = 'Bitte geben Sie eine gültige E-Mail-Adresse an.';
    $email ='';
}elseif(''=== trim($email)) {
    $errors['email'] = 'Bitte geben Sie Ihre E-Mail-Adresse an.';
}

$message = filter_input(INPUT_POST, 'nachricht');
if('' === trim($message)) {
    $errors['message'] = 'Bitte geben Sie Ihre Nachricht an.';
}

if(0 < count($errors)) {

    $params = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'message' => $message,
        'errors' => $errors,
    ];
    $url = 'index.php?'. http_build_query($params);

    echo '<pre>' .print_r($url, true).'</pre>';
    echo '<pre>' .print_r($params, true).'</pre>';
    redirect($url);
}


echo '<pre>' .print_r($errors, true).'</pre>';



