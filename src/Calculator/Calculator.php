<?php

namespace SavvyTech\Race\Calculator;

use SavvyTech\Race\Calculator\Contract\CalculatorInterface;
use SavvyTech\Race\Vehicle\Component\AirMarineVehicle;
use SavvyTech\Race\Vehicle\Component\LandVehicle;
use SavvyTech\Race\Vehicle\Vehicle;

class Calculator implements CalculatorInterface
{
	private $vehicle;

	public function __construct()
	{
		$this->vehicle = new Vehicle();
	}

	public function handle($playerOneVehicle, $playerTwoVehicle, $distance) :array
	{
		// Find Player vehicle unit and max speed
		[$playerOneUnit, $playerOneMaxSpeed] = $this->vehicle->vehicleDetail($playerOneVehicle);
		[$playerTwoUnit, $playerTwoMaxSpeed] = $this->vehicle->vehicleDetail($playerTwoVehicle);


		// Calculate covered distance in hour
		$playerOneResult = $this->coveredDistanceCalculator($playerOneUnit, $playerOneMaxSpeed, $distance);
		$playerTwoResult = $this->coveredDistanceCalculator($playerTwoUnit, $playerTwoMaxSpeed, $distance);

		return [$this->winnerGenerator($playerOneResult, $playerTwoResult), $playerOneResult, $playerTwoResult];
	}

	private function coveredDistanceCalculator($unit, $speed, $distance) :float
	{
		if (in_array($unit, ["Kts", "knots"])) {
			$airMarine = new AirMarineVehicle();
			$result    = $airMarine->distanceCalculator($speed, $distance);
		} else {
			$land   = new LandVehicle();
			$result = $land->distanceCalculator($speed, $distance);
		}

		return $result;
	}

	private function winnerGenerator($playerOneResult, $playerTwoResult) :string
	{
		return $playerOneResult > $playerTwoResult ? 'player_two' : 'player_one';
	}
}