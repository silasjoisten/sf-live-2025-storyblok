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
    public function idKeyMustExist(): void
    {
        $values = PostFactory::createOne();
        unset($values['id']);

        self::expectException(\InvalidArgumentException::class);

        new Post($values);
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
    public function titleKeyMustExist(): void
    {
        $values = PostFactory::createOne();
        unset($values['title']);

        self::expectException(\InvalidArgumentException::class);

        new Post($values);
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
    public function descriptionKeyMustExist(): void
    {
        $values = PostFactory::createOne();
        unset($values['description']);

        self::expectException(\InvalidArgumentException::class);

        new Post($values);
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
    public function imageKeyMustExist(): void
    {
        $values = PostFactory::createOne();
        unset($values['image']);

        self::expectException(\InvalidArgumentException::class);

        new Post($values);
    }

    /**
     * @test
     */
    public function imageUrlKeyMustExist(): void
    {
        $values = PostFactory::createOne([
            'image' => [
                'alt' => self::faker()->sentence(),
            ]
        ]);

        self::expectException(\InvalidArgumentException::class);

        new Post($values);
    }

    /**
     * @test
     */
    public function imageAltKeyMustExist(): void
    {
        $values = PostFactory::createOne([
            'image' => [
                'url' => self::faker()->url(),
            ]
        ]);

        self::expectException(\InvalidArgumentException::class);

        new Post($values);
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
    public function authorKeyMustExist(): void
    {
        $values = PostFactory::createOne();
        unset($values['author']);

        self::expectException(\InvalidArgumentException::class);

        new Post($values);
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
    public function categoryKeyMustExist(): void
    {
        $values = PostFactory::createOne();
        unset($values['category']);

        self::expectException(\InvalidArgumentException::class);

        new Post($values);
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

    /**
     * @test
     */
    public function contentKeyMustExist(): void
    {
        $values = PostFactory::createOne();
        unset($values['content']);

        self::expectException(\InvalidArgumentException::class);

        new Post($values);
    }
}