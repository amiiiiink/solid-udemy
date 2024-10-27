<?php

class Vehicle
{
    private string $problemType;

    public function __construct(string $problemType)
    {
        $this->problemType = $problemType;
    }

    public function problem() :string
    {
        return $this->problemType;
    }
}

class Car extends Vehicle
{

}
class Mercedes extends Car
{

}

class Mechanic
{
    public function fix(Car $car)
    {
        return "mechanic is fixing ... ".get_class($car)." - ".$car->problem()." \n";
    }
}

$vehicle = new Vehicle('Gera Box Problem ... ');
//echo $vehicle->problem();

$mechanic = new Mechanic();
$car = new Car('Gera Box Problem ... ');
//echo $mechanic->fix($car);
echo $mechanic->fix($vehicle);


