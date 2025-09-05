<?php

declare(strict_types=1);


use App\DTOs\ConteactDTO;
use App\Enums\ContactActionEnum;
use App\Enums\FlashMessageEnum;
use App\Repositories\ContactRepository;
use DI\Container;
use DI\ContainerBuilder;

require_once realpath(__DIR__ ).'/src/autoloader.php';

session_start();

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(require realpath(__DIR__).'/config/di.php');
$container = $containerBuilder->build();

$dbConfig = require dirname(__DIR__.'/..') . '/config/database.php';

/** @var ContactRepository $contectRepository */
$contactRepository = $container->get(ContactRepository::class);

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
        render('contacts/list',  [
            'title' => 'Kontakte',
            'contacts' => $contacts,
            ]);
    break;
    case ContactActionEnum::Edit:
        //echo '<pre>'; print_r($_SESSION).'</pre>';
        $id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);
        if (false === $id || null === $id) {
            redirect();
        }
        $contect = $contectRepository->findById($id);

        render('contacts/form', [
            'title' => "Kontakt bearbeiten <em>{$contect->getName()}</em>",
            'contact' => $contect,
            'errors' => $_SESSION['errors'] ?? [],
        ]);
        unset($_SESSION['errors']);
        //echo '<pre>'; print_r($contect).'</pre>';
        break;
    case ContactActionEnum::Save:

       $dto = ConteactDTO::fromPost();
       $res = $dto->validate();

        if(is_array($res) && ! empty($res)) {
            $_SESSION['errors'] = $res;
            $_SESSION['dto'] = $dto;
            $action = $dto->hasId() ? ContactActionEnum::Edit : ContactActionEnum::Create;

            $url = 'index.php?action='. $action->value;
            if ($dto->hasId()) {
                $url .= '&id='.$dto->getId();
            }
            $dto->asOld();
            redirect($url);
        }

        if ($dto->hasId()) {
            $res = $contectRepository->update($dto->getId(), $dto);
            setFlash(FlashMessageEnum::Success, 'Der Kontakt wurde erfolgreich aktualisiert.');
        } else {
            $newId = $contectRepository->create($dto);
            if (0 < $newId) {
                setFlash(FlashMessageEnum::Success, 'Der Kontakt wurde erfolgreich angelegt.');
                $res = true;
            }
        }
        redirect();
        break;
    case ContactActionEnum::Create:

        render('contacts/form', [
            'title' => 'Neuen Kontakt anlegen',
            'errors' => $_SESSION['errors'] ?? [],
        ]);

        unset($_SESSION['errors']);
    break;
    case ContactActionEnum::Delete:

        $id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);
        if (false !== $id && null !== $id) {
            $contectRepository->delete($id);
            setFlash(FlashMessageEnum::Success, 'Der Kontakt wurde gelöscht.');
        }
        else{
            setFlash(FlashMessageEnum::Error, 'Der Kontakt konnte nicht gelöscht werden.');
        }

        redirect();
        break;
}


// echo '<pre>'; print_r($dbConfig).'</pre>';
// echo '<pre>'; print_r($res).'</pre>';
// echo  '<pre>'; print_r($contacts).'</pre>';