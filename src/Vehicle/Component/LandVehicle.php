<?php

namespace SavvyTech\Race\Vehicle;

use SavvyTech\Race\Vehicle\Vehicle;

class LandVehicle extends Vehicle implements VehicleInterface
{
	public function distanceCalculator($speed, $distance) :float
	{
		return $distance / $speed;
	}
}