<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

abstract class UnitTestCase extends TestCase
{
    use Factories;

    private static ?Generator $faker = null;

    final protected function faker(): Generator
    {
        return self::$faker ??= Factory::create();
    }
}