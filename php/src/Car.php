<?php

declare(strict_types=1);
class Car extends Vehicle
{
    protected int $numberOfWheels = 4;

    protected int $maxNumberOfPersons = 5;

    protected int $numberOfDoors = 5;

    public function getNumberOfDoors(): int
    {
        return $this->numberOfDoors;
    }

    public function __toString(): string
    {
        $baseString = parent::__toString();
        return $baseString . " Es hat {$this->getNumberOfDoors()} Türen.";

    }

    /**
     * @throws Exception
     */
    public function setNumberOfDoors(int $numberOfDoors): self
    {
        if (0 >= $numberOfDoors) {
            throw new Exception('Ein Auto muss mindestens eine Tür haben.');
        }
        $this->numberOfDoors = $numberOfDoors;
        return $this;
    }



}