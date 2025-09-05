<?php
declare(strict_types=1);
namespace App\Enums;

enum ContactActionEnum: string
{
    case List = 'list';
    case Create = 'create';
    case Edit = 'edit';
    case Save = 'save';
    case Delete = 'delete';
}
