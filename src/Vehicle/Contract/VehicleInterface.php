<?php

namespace SavvyTech\Race\Vehicle;

interface VehicleInterface
{
	public function distanceCalculator($speed, $distance);
}