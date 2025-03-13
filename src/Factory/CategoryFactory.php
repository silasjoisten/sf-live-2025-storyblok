<?php

declare(strict_types=1);

namespace App\Factory;

use Symfony\Component\String\Slugger\AsciiSlugger;
use Zenstruck\Foundry\ArrayFactory;

final class CategoryFactory extends ArrayFactory
{
    protected function defaults(): array
    {
        $name = self::faker()->word();

        return [
            'id' => self::faker()->numberBetween(1),
            'name' => $name,
            'slug' => sprintf('blog/categories/%s', (new AsciiSlugger())->slug($name)->lower()->toString()),
            'title' => self::faker()->sentence(),
            'description' => self::faker()->text(),
        ];
    }
}