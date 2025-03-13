<?php

declare(strict_types=1);

namespace App\Factory;

use Symfony\Component\String\Slugger\AsciiSlugger;
use Zenstruck\Foundry\ArrayFactory;

final class PostFactory extends ArrayFactory
{
    protected function defaults(): array
    {
        $title = self::faker()->sentence();

        return [
            'id' => self::faker()->numberBetween(1),
            'title' => $title,
            'slug' => sprintf('blog/%s', (new AsciiSlugger())->slug($title)->lower()->toString()),
            'description' => self::faker()->text(),
            'image' => [
                'url' => sprintf('https://picsum.photos/seed/%d/640/480', self::faker()->randomNumber()),
                'alt' => self::faker()->sentence(),
            ],
            'author' => AuthorFactory::createOne(),
            'category' => CategoryFactory::createOne(),
            'content' => self::faker()->randomHtml(),
        ];
    }
}