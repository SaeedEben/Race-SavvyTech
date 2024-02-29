<?php

namespace SavvyTech\Race\Console;

use Illuminate\Console\Command;
use function cli\out;

class RaceCommand extends Command
{
	protected $signature = 'race:start';

	protected $description = 'Race Players with selected vehicles';

	public function handle()
	{
		dd('here');
		out("Hi There");
	}

}