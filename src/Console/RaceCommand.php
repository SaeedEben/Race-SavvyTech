<?php

namespace SavvyTech\Race\Console;

use cli\notify\Dots;
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
	private $calculator;

	public function __construct()
	{
		parent::__construct();
		$this->vehicles   = new Vehicle();
		$this->calculator = new Calculator();
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

		[$result, $P1Result, $P2Result] = $this->calculator->handle($P1Choose, $P2Choose, $distance);

		$this->progressBar();

		out("The Winner is: {$result}");
		line();
		out("Player One Time(Hour) Result: {$P1Result}, and Player Two Time(Hour) Result: {$P2Result}");
		line();
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

	public function progressBar()
	{
		$total = 20;
		$bar   = new Dots('Processing', $total, 1);

		for ($i = 0; $i < $total; $i++) {
			usleep(100000);

			$bar->tick();
		}

		$bar->finish();
	}
}