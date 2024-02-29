<?php

namespace SavvyTech\Race\Vehicle\Component;

use SavvyTech\Race\Vehicle\Contract\VehicleInterface;
use SavvyTech\Race\Vehicle\Vehicle;

class AirMarineVehicle extends Vehicle implements VehicleInterface
{
	public function distanceCalculator($speed, $distance) :float
	{
		$convertToKMPH = $speed * 1.852;

		return $distance / $convertToKMPH;
	}
}