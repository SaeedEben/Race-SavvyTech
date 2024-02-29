<?php

namespace SavvyTech\Race;

use Illuminate\Support\ServiceProvider;
use SavvyTech\Race\Console\RaceCommand;

class RaceServiceProvider extends ServiceProvider
{
	public function register()
	{

	}

	public function boot()
	{
		if ($this->app->runningInConsole()) {
			$this->commands([
				RaceCommand::class,
			]);
		}
	}
}