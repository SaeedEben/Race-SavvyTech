<?php

namespace SavvyTech\Race\Console;

use Illuminate\Console\Command;
use SavvyTech\Race\Vehicle\Vehicle;
use function cli\line;
use function cli\menu;
use function cli\out;
use function cli\out_padded;

class RaceCommand extends Command
{
	protected $signature = 'race:start';

	protected $description = 'Race Players with selected vehicles';

	/**
	 * @throws \Exception
	 */
	public function handle()
	{
		out_padded("Welcome to the Race competition, Please for select press Enter on your Keyboard");
		$P1Choose = $this->getPlayerVehicle(1);
		$P2Choose = $this->getPlayerVehicle(2);

		$distance = $this->getDistance();
	}

	public function getPlayerVehicle($num) :string
	{
		$vehicles = new Vehicle();
		line();
		out("Player " . $num . " turn to choose vehicle:");
		line();
		return menu($vehicles->getVehicles());
	}

	public function getDistance()
	{
		$distance = readline("Enter a distance for race (km): \n");
		if (!is_numeric($distance) && $distance <= 0) {
			out("Distance must be numeric");
		}

		return $distance;
	}

}