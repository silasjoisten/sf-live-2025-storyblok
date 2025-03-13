<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Value;

use App\Domain\Value\Description;
use App\Tests\Unit\UnitTestCase;

final class DescriptionTest extends UnitTestCase
{
    /**
     * @test
     */
    public function value(): void
    {
        $expected = self::faker()->text();

        self::assertSame($expected, (new Description($expected))->value);
    }
}