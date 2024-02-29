<?php

namespace SavvyTech\Race\Calculator;

interface CalculatorInterface
{
	public function handle($playerOneVehicle, $playerTwoVehicle, $distance);

	public function converter($vehicle);
}