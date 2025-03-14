<?php

declare(strict_types=1);

namespace App\Controller;

use App\Domain\Value\Slug;
use App\Factory\PostFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DetailController extends AbstractController
{
    #[Route(
        path: '/{slug}',
        name: 'detail',
        requirements: ['slug' => Slug::PATTERN],
        priority: -1000,
    )]
    public function index(string $slug): Response
    {
        $post = PostFactory::createOne();

        return $this->render('detail.html.twig', [
            'post' => $post,
        ]);
    }
}