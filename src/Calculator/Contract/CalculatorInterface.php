<?php

namespace SavvyTech\Race\Calculator\Contract;

interface CalculatorInterface
{
	public function handle($playerOneVehicle, $playerTwoVehicle, $distance);
}