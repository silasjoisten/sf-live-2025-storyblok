<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Value\Description;
use App\Domain\Value\HtmlContent;
use App\Domain\Value\Id\PostId;
use App\Domain\Value\Image;
use App\Domain\Value\Title;

final readonly class Post
{
    public PostId $id;
    public Title $title;
    public Description $description;
    public Image $image;
    public Author $author;
    public Category $category;
    public HtmlContent $content;

    public function __construct(array $values)
    {
        $this->id = new PostId($values['id']);
        $this->title =  new Title($values['title']);
        $this->description = new Description($values['description']);
        $this->image = new Image($values['image']['url'], $values['image']['alt']);
        $this->author = new Author($values['author']);
        $this->category = new Category($values['category']);
        $this->content = new HtmlContent($values['content']);
    }
}
