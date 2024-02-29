<?php

namespace SavvyTech\Race\Calculator;

interface CalculatorInterface
{
	public function manager($playerOneVehicle, $playerTwoVehicle, $distance);

	public function converter($vehicle);
}