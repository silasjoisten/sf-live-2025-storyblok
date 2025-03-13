<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Value\Id\AuthorId;
use App\Domain\Value\Social;

final readonly class Author
{
    public AuthorId $id;
    public string $name;
    public string $bio;
    public array $socials;

    public function __construct(array $values)
    {
        $this->id =  new AuthorId($values['id']);
        $this->name =  $values['name'];
        $this->bio = $values['bio'];
        $this->socials = \array_map(
            static fn(array $social) => new Social($social['icon'], $social['name']),
            $values['socials'],
        );
    }
}
