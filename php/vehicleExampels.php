<?php
declare(strict_types=1);
include_once 'src/ManufacturerEnum.php';
include_once 'src/Vehicle.php';
include_once 'src/Car.php';
include_once 'src/Bicycle.php';
include_once 'src/Trike.php';


$car = new Car();
$bicycle = new Bicycle();
$trike = new Trike();

$audi = (new Car())
    ->setManufacturer(ManufacturerEnum::Audi);

$smart = (new Car())->setManufacturer(ManufacturerEnum::Smart)
    ->setMaxNumberOfPersons(2)
    ->setNumberOfDoors(3);

$bmw = (new Car())->setManufacturer(ManufacturerEnum::BMW)
    ->setMaxNumberOfPersons(4)
    ->setNumberOfDoors(3);




echo $audi . "<br />";
echo $smart . "<br />";
echo $bmw . "<br />";
echo $car . "<br />";
echo $bicycle . "<br />";
echo $trike . "<br />";




