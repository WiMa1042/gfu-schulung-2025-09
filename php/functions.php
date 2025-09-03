<?php

function add (int $a, int $b): int
{
    return $a + $b;
}

function formatName (string $firstName, string $lastName): string
{
    $smallFirstName = strtolower($firstName);
    $smallLastName = strtolower($lastName);
    return ucfirst($smallFirstName) . ', ' .ucfirst($smallLastName);
}