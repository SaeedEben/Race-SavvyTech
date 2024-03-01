<?php

namespace SavvyTech\Race\Vehicle;

class Vehicle
{
	protected $KtsToKmh = 1.852;

	/**
	 * read the vehicles.json file
	 *
	 * @return mixed
	 */
	protected function readFile()
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
	 * @return array
	 */
	public function vehicleDetail($name) :array
	{
		$vehicles = $this->readFile();

		$result = [];
		foreach ($vehicles as $vehicle) {
			if ($vehicle['name'] === $name) {
				$result[] = $vehicle['unit'];
				$result[] = $vehicle['maxSpeed'];
				break;
			}
		}

		return $result;
	}

}