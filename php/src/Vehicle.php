<?php
declare(strict_types=1);

abstract class Vehicle{
    protected int $numberOfWheels;

    protected int $maxNumberOfPersons;

    protected ManufacturerEnum|null $manufacturer = null;
    /**
     * @throws Exception
     */
    public function __toString(): string
    {
        $className = get_class($this);
        if(null !== $this->getManufacturer()){
            $className .= " vom Hersteller {$this->getManufacturer()->name}";
        }
        return "Das {$className} hat {$this->getNumberOfWheels()} Räder und ist für {$this->getMaxNumberOfPersons()} Personen geeignet.";
    }

    /**
     * @throws Exception
     */
    public function setNumberOfWheels(int $numberOfWheels): self
    {
        if (0>= $numberOfWheels ) {
            throw new Exception('Ein Fahrzeug muss mindestens ein Rad haben.');
        }
        $this->numberOfWheels = $numberOfWheels;
        return $this;
    }
    public function getNumberOfWheels(): int
    {
        return $this->numberOfWheels;
    }


    /**
     * @throws Exception
     */
    public function setMaxNumberOfPersons(int $maxNumberOfPersons): self
    {
        if(0 > $maxNumberOfPersons){
            throw new Exception('Ein Fahrzeug muss mindestens eine Person befördern können.');
        }
        $this->maxNumberOfPersons = $maxNumberOfPersons;
        return $this;
    }
    public function getMaxNumberOfPersons(): int
    {
        return $this->maxNumberOfPersons;
    }


    public function getManufacturer(): ?ManufacturerEnum
    {
        return $this->manufacturer;
    }

    public function setManufacturer(?ManufacturerEnum $manufacturer): self
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    static public function createVehicleFromManu(int $wheels)
    {
        $vehicle = new static();
        $vehicle->setNumberOfWheels($wheels);

    }


}