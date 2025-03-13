<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Entity;

use App\Domain\Entity\Category;
use App\Factory\CategoryFactory;
use App\Tests\Unit\UnitTestCase;

final class CategoryTest extends UnitTestCase
{
    /**
     * @test
     */
    public function id(): void
    {
        $values = CategoryFactory::createOne([
            'id' => $expected = self::faker()->numberBetween(1),
        ]);

        self::assertSame($expected, (new Category($values))->id->value);
    }

    /**
     * @test
     */
    public function name(): void
    {
        $values = CategoryFactory::createOne([
            'name' => $expected = self::faker()->sentence(),
        ]);

        self::assertSame($expected, (new Category($values))->name);
    }

    /**
     * @test
     */
    public function title(): void
    {
        $values = CategoryFactory::createOne([
            'title' => $expected = self::faker()->sentence(),
        ]);

        self::assertSame($expected, (new Category($values))->title->value);
    }

    /**
     * @test
     */
    public function description(): void
    {
        $values = CategoryFactory::createOne([
            'description' => $expected = self::faker()->text(),
        ]);

        self::assertSame($expected, (new Category($values))->description->value);
    }

}