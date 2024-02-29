<?php

namespace SavvyTech\Race\Vehicle;

class Vehicle
{

	/**
	 * read the vehicles.json file
	 *
	 * @return mixed
	 */
	public function readFile()
	{
		$filePath = __DIR__ . '/vehicles.json';
		$file     = file_get_contents($filePath);
		return json_decode($file, true);
	}

	/**
	 * return vehicles names
	 *
	 * @return array
	 */
	public function getVehicles() :array
	{
		$vehicles = $this->readFile();

		$names = [];
		foreach ($vehicles as $vehicle) {
			$names[] = $vehicle['name'];
		}

		return $names;
	}

	/**
	 * unit finder for vehicles
	 *
	 * @param $name
	 *
	 * @return mixed|void
	 */
	public function vehicleUnitKind($name)
	{
		$vehicles = $this->readFile();

		$result = '';
		foreach ($vehicles as $vehicle) {
			if ($vehicle['name'] === $name) {
				$result = $vehicle['unit'];
				break;
			}
		}

		return $result;
	}

}