<?php
declare(strict_types=1);
include_once 'src/Vehicle.php';
include_once 'src/Car.php';
include_once 'src/Bicycle.php';
include_once 'src/Trike.php';


$car = new Car();
$bicycle = new Bicycle();
$trike = new Trike();

$audi = new Car();
$audi->setManufacturer('Audi');

$smart = new Car();
$smart->setManufacturer('Smart');
$smart->setMaxNumberOfPersons(2);
$smart->setNumberOfDoors(3);




echo $audi . "<br />";
echo $smart . "<br />";
echo $trike . "<br />";




