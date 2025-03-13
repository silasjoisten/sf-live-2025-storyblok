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
    public function socials(): void
    {
        $values = AuthorFactory::createOne();

        self::assertCount(\count($values['socials']), (new Author($values))->socials);
    }
}