<?php

declare(strict_types=1);

use App\Enums\FlashMessageEnum;

function redirect(string $url = 'index.php'): void{
    header('Location: '. $url);
    exit;
}

function  render(string $template, array $vars = []): void
{
    $flash = getFlash();
    extract($vars);
    ob_start();
    include realpath(__DIR__.'/../templates').'/'.$template.'.phtml';
    $content = ob_get_clean();
    include realpath(__DIR__.'/../templates').'/layout.phtml';
}

function old(string $name, object|null $object = null): string
{
    if (isset($_SESSION['old'][$name])) {
        $value = $_SESSION['old'][$name];
        unset($_SESSION['old'][$name]);
        return htmlspecialchars((string)$value);
    }

    if(null!== $object){
        $getter = 'get' .ucfirst($name);
        if(method_exists($object, $getter)){
            return htmlspecialchars((string)$object->$getter(), ENT_QUOTES, 'UTF-8');
        }
    }
    return '';
}

function setFlash(FlashMessageEnum $type, string $message): void
{
    $_SESSION['flash'] = [
        'type' => $type->value,
        'message' => $message,
    ];
}
function getFlash(): array|null
{
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}