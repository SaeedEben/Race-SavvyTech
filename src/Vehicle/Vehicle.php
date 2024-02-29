<?php

namespace SavvyTech\Race\Vehicle;

class Vehicle
{
	public function getVehicles() :array
	{
		$filePath = __DIR__ . '/vehicles.json';
		$file     = file_get_contents($filePath);
		$vehicles = json_decode($file, true);

		$names = [];
		foreach ($vehicles as $vehicle) {
			$names[] = $vehicle['name'];
		}

		return $names;
	}
}