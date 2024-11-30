<?php

interface CarInterface2
{
    public function steer();
}

interface Fuelable{
    public function getFuel();
}
interface Gearable
{
    public function shiftGear();
}
class ElectricCar implements CarInterface2, Gearable
{

    public function steer()
    {
        // TODO: Implement steer() method.
    }

    public function shiftGear()
    {
        // TODO: Implement shiftGear() method.
    }
}

class AutomaticCar implements CarInterface2,Fuelable
{

    public function steer()
    {
        // TODO: Implement steer() method.
    }


    public function getFuel()
    {
        // TODO: Implement getFuel() method.
    }
}
