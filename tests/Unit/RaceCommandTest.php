<?php

namespace SavvyTech\Race\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use SavvyTech\Race\Tests\TestCase;


class RaceCommandTest extends TestCase
{
	/**
	 * @test
	 */
	public function race_command_test()
	{
		Artisan::call("race:start");
		$this->assertTrue(true);
	}
}