<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Value\Description;
use App\Domain\Value\HtmlContent;
use App\Domain\Value\Id\PostId;
use App\Domain\Value\Image;
use App\Domain\Value\Title;
use Webmozart\Assert\Assert;

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
        Assert::keyExists($values, 'id');
        $this->id = new PostId($values['id']);

        Assert::keyExists($values, 'title');
        $this->title =  new Title($values['title']);

        Assert::keyExists($values, 'description');
        $this->description = new Description($values['description']);

        Assert::keyExists($values, 'image');
        Assert::keyExists($values['image'], 'url');
        Assert::keyExists($values['image'], 'alt');
        $this->image = new Image($values['image']['url'], $values['image']['alt']);

        Assert::keyExists($values, 'author');
        $this->author = new Author($values['author']);

        Assert::keyExists($values, 'category');
        $this->category = new Category($values['category']);

        Assert::keyExists($values, 'content');
        $this->content = new HtmlContent($values['content']);
    }
}
