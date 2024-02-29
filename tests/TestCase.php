<?php

namespace SavvyTech\Race\Tests;

use SavvyTech\Race\RaceServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
	public function setUp() :void
	{
		parent::setUp();
	}

	protected function getPackageProviders($app)
	{
		return [
			RaceServiceProvider::class,
		];
	}
}