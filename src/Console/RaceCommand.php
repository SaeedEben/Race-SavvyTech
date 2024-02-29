<?php

namespace SavvyTech\Race\Console;

use cli\progress\Bar;
use Illuminate\Console\Command;
use SavvyTech\Race\Calculator\Calculator;
use SavvyTech\Race\Vehicle\Vehicle;
use function cli\line;
use function cli\menu;
use function cli\out;
use function cli\out_padded;

class RaceCommand extends Command
{
	protected $signature = 'race:start';

	protected $description = 'Race Players with selected vehicles';

	private $vehicles;

	public function __construct()
	{
		parent::__construct();
		$this->vehicles = new Vehicle();
	}

	/**
	 * @throws \Exception
	 */
	public function handle()
	{
		out_padded("Welcome to the Race competition, Please for progress press Enter on your Keyboard");

		$P1Choose = $this->getPlayerVehicle(1);
		out("Player one Choose {$P1Choose}");

		$P2Choose = $this->getPlayerVehicle(2);
		out("Player two Choose {$P2Choose}");

		$distance = $this->getDistance();

		$calculator = new Calculator();
		$result     = $calculator->handle($P1Choose, $P2Choose, $distance);

		new Bar('Wait For Calculating' , 1000,100);
		out($result);
	}

	public function getPlayerVehicle($num) :string
	{
		line();
		out("Player " . $num . " turn to choose vehicle:");
		line();
		$vehicles = $this->vehicles->getVehicles();
		$chosen   = menu($vehicles);
		return $vehicles[$chosen];
	}

	public function getDistance()
	{
		line();
		$distance = readline("Enter a distance for race (km): \n");
		if (!is_numeric($distance) || (int)$distance <= 0) {
			out("Distance must be numeric and greater than 0!");
		}

		return $distance;
	}

}