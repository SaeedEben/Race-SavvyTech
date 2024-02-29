<?php

namespace SavvyTech\Race\Vehicle\Component;

use SavvyTech\Race\Vehicle\Contract\VehicleInterface;
use SavvyTech\Race\Vehicle\Vehicle;

class LandVehicle extends Vehicle implements VehicleInterface
{
	public function distanceCalculator($speed, $distance) :float
	{
		return $distance / $speed;
	}
}