<?php

namespace SavvyTech\Race\Vehicle;

interface VehicleInterface
{
	public function speedConverter($speed);

	public function distanceCalculator($speed, $distance);
}