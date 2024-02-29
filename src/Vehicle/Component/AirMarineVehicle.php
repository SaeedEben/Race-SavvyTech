<?php

namespace SavvyTech\Race\Vehicle;

class AirMarineVehicle extends Vehicle
{
	public function distanceCalculator($speed, $distance) :float
	{
		$convertToKMPH = $speed * 1.852;

		return $distance / $convertToKMPH;
	}
}