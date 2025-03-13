<?php

declare(strict_types=1);

namespace App\Factory;

use Zenstruck\Foundry\ArrayFactory;

final class PostFactory extends ArrayFactory
{
    protected function defaults(): array
    {
        return [
            'id' => self::faker()->numberBetween(1),
            'title' => self::faker()->sentence(),
            'description' => self::faker()->text(),
            'image' => [
                'url' => self::faker()->url(),
                'alt' => self::faker()->sentence(),
            ],
            'author' => AuthorFactory::createOne(),
            'category' => CategoryFactory::createOne(),
            'content' => self::faker()->randomHtml(),
        ];
    }
}