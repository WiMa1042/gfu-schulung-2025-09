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


echo add(1, 2);
echo formatName('MAX', 'MUSTERMANN');

$var = 'Max';
echo 'meine name ist $var';
echo "meine name ist {$var}";
const MAX_SIZE = 10;

$hour = date("H");
if ($hour < 10) {
    $grreeting = "Good morning!";
} elseif ($hour > 14) {
    $grreeting = "Good afternoon!";
} else {
    $grreeting = "Mahlzeit!";
}

for ($i = 0; $i <= MAX_SIZE; $i++) {
    $grreeting .= "!";
}

$array = [1, 2, 3, 4, 5];
foreach ($array as $value) {
    $grreeting .= ".";
}
    echo  $grreeting;
/**
$lebensmittel = "apfel";
$value = match ($lebensmittel) {
    "apfel" => "Apfelkuchen",
    "banane" => "Bananenshake",
    "orange" => "Orangensaft",
    default => "Wasser",
};*/