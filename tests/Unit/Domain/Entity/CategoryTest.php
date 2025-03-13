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
    public function idKeyMustExist(): void
    {
        $values = CategoryFactory::createOne();
        unset($values['id']);

        self::expectException(\InvalidArgumentException::class);

        new Category($values);
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
    public function nameKeyMustExist(): void
    {
        $values = CategoryFactory::createOne();
        unset($values['name']);

        self::expectException(\InvalidArgumentException::class);

        new Category($values);
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
    public function titleKeyMustExist(): void
    {
        $values = CategoryFactory::createOne();
        unset($values['title']);

        self::expectException(\InvalidArgumentException::class);

        new Category($values);
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

    /**
     * @test
     */
    public function descriptionKeyMustExist(): void
    {
        $values = CategoryFactory::createOne();
        unset($values['description']);

        self::expectException(\InvalidArgumentException::class);

        new Category($values);
    }
}