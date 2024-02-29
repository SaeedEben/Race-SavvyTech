<?php

namespace SavvyTech\Race\Calculator;

use SavvyTech\Race\Vehicle\Vehicle;

class Calculator implements CalculatorInterface
{
	private $vehicle;

	public function __construct()
	{
		$this->vehicle = new Vehicle();
	}

	public function handle($playerOneVehicle, $playerTwoVehicle, $distance)
	{
		$playerOneUnit = $this->vehicle->vehicleUnitKind($playerOneVehicle);
		$playerTwoUnit = $this->vehicle->vehicleUnitKind($playerTwoVehicle);


	}
}