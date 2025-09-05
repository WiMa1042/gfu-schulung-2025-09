<?php

namespace App\Enums;

enum FlashMessageEnum: string
{
    case Success = 'success';
    case Error = 'error';
    case Warning = 'warning';
    case Info = 'info';
}
