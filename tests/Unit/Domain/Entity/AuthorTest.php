<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Entity;

use App\Domain\Entity\Author;
use App\Factory\AuthorFactory;
use App\Tests\Unit\UnitTestCase;

final class AuthorTest extends UnitTestCase
{
    /**
     * @test
     */
    public function id(): void
    {
        $values = AuthorFactory::createOne([
            'id' => $expected = self::faker()->numberBetween(1),
        ]);

        self::assertSame($expected, (new Author($values))->id->value);
    }

    /**
     * @test
     */
    public function idKeyMustExist(): void
    {
        $values = AuthorFactory::createOne();
        unset($values['id']);

        self::expectException(\InvalidArgumentException::class);

        new Author($values);
    }

    /**
     * @test
     */
    public function slug(): void
    {
        $values = AuthorFactory::createOne([
            'slug' => $expected = self::faker()->slug(),
        ]);

        self::assertSame($expected, (new Author($values))->slug->value);
    }

    /**
     * @test
     */
    public function slugKeyMustExist(): void
    {
        $values = AuthorFactory::createOne();
        unset($values['slug']);

        self::expectException(\InvalidArgumentException::class);

        new Author($values);
    }

    /**
     * @test
     */
    public function name(): void
    {
        $values = AuthorFactory::createOne([
            'name' => $expected = self::faker()->sentence(),
        ]);

        self::assertSame($expected, (new Author($values))->name);
    }

    /**
     * @test
     */
    public function nameKeyMustExist(): void
    {
        $values = AuthorFactory::createOne();
        unset($values['name']);

        self::expectException(\InvalidArgumentException::class);

        new Author($values);
    }

    /**
     * @test
     */
    public function bio(): void
    {
        $values = AuthorFactory::createOne([
            'bio' => $expected = self::faker()->text(),
        ]);

        self::assertSame($expected, (new Author($values))->bio);
    }

    /**
     * @test
     */
    public function bioKeyMustExist(): void
    {
        $values = AuthorFactory::createOne();
        unset($values['bio']);

        self::expectException(\InvalidArgumentException::class);

        new Author($values);
    }

    /**
     * @test
     */
    public function socials(): void
    {
        $values = AuthorFactory::createOne();

        self::assertCount(\count($values['socials']), (new Author($values))->socials);
    }

    /**
     * @test
     */
    public function socialsKeyMustExist(): void
    {
        $values = AuthorFactory::createOne();
        unset($values['socials']);

        self::expectException(\InvalidArgumentException::class);

        new Author($values);
    }

    /**
     * @test
     */
    public function socialsNameAllKeyMustExist(): void
    {
        $values = AuthorFactory::createOne([
            'socials' => [
                [
                    'name' => self::faker()->sentence(),
                    'icon' => self::faker()->word(),
                ],
                [
                    'icon' => self::faker()->word(),
                ],
            ]
        ]);

        self::expectException(\InvalidArgumentException::class);

        new Author($values);
    }

    /**
     * @test
     */
    public function socialsIconAllKeyMustExist(): void
    {
        $values = AuthorFactory::createOne([
            'socials' => [
                [
                    'icon' => self::faker()->word(),
                ],
                [
                    'name' => self::faker()->sentence(),
                    'icon' => self::faker()->word(),
                ],
            ]
        ]);

        self::expectException(\InvalidArgumentException::class);

        new Author($values);
    }
}