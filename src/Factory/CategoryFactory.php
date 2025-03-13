<?php

declare(strict_types=1);

namespace App\Factory;

use Zenstruck\Foundry\ArrayFactory;

final class CategoryFactory extends ArrayFactory
{
    protected function defaults(): array
    {
        return [
            'id' => self::faker()->numberBetween(1),
            'name' => self::faker()->word(),
            'title' => self::faker()->sentence(),
            'description' => self::faker()->text(),
        ];
    }
}