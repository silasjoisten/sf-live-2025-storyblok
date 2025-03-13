<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Entity;

use App\Domain\Entity\Post;
use App\Factory\AuthorFactory;
use App\Factory\CategoryFactory;
use App\Factory\PostFactory;
use App\Tests\Unit\UnitTestCase;

final class PostTest extends UnitTestCase
{
    /**
     * @test
     */
    public function id(): void
    {
        $values = PostFactory::createOne([
            'id' => $expected = self::faker()->numberBetween(1),
        ]);

        self::assertSame($expected, (new Post($values))->id->value);
    }

    /**
     * @test
     */
    public function title(): void
    {
        $values = PostFactory::createOne([
            'title' => $expected = self::faker()->sentence(),
        ]);

        self::assertSame($expected, (new Post($values))->title->value);
    }

    /**
     * @test
     */
    public function description(): void
    {
        $values = PostFactory::createOne([
            'description' => $expected = self::faker()->text(),
        ]);

        self::assertSame($expected, (new Post($values))->description->value);
    }

    /**
     * @test
     */
    public function image(): void
    {
        $values = PostFactory::createOne([
            'image' => [
                'url' => $expected = self::faker()->url(),
                'alt' => self::faker()->sentence(),
            ]
        ]);

        self::assertSame($expected, (new Post($values))->image->url);
    }

    /**
     * @test
     */
    public function author(): void
    {
        $values = PostFactory::createOne([
            'author' => AuthorFactory::createOne([
                'name' => $expected = self::faker()->name(),
            ]),
        ]);

        self::assertSame($expected, (new Post($values))->author->name);
    }

    /**
     * @test
     */
    public function category(): void
    {
        $values = PostFactory::createOne([
            'category' => CategoryFactory::createOne([
                'name' => $expected = self::faker()->name(),
            ]),
        ]);

        self::assertSame($expected, (new Post($values))->category->name);
    }

    /**
     * @test
     */
    public function content(): void
    {
        $values = PostFactory::createOne([
            'content' => $expected = self::faker()->randomHtml(),
        ]);

        self::assertSame($expected, (new Post($values))->content->value);
    }
}