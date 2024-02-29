<?php

namespace SavvyTech\Race\Vehicle\Contract;

interface VehicleInterface
{
	public function distanceCalculator($speed, $distance);
}