<?php
declare(strict_types=1);

use App\Interfaces\Repositories\ContecRepositoryInterface;
use App\Repositories\ContectRepository;

return[
    ContecRepositoryInterface::class => ContectRepository::class,
];
