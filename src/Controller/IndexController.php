<?php

declare(strict_types=1);

namespace App\Controller;

use App\Domain\Entity\Post;
use App\Factory\PostFactory;
use Storyblok\Api\Domain\Value\Dto\Pagination;
use Storyblok\Api\Domain\Value\Resolver\Relation;
use Storyblok\Api\Domain\Value\Resolver\RelationCollection;
use Storyblok\Api\Request\StoriesRequest;
use Storyblok\Api\StoriesApiInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
//    public function __construct(
//        private StoriesApiInterface $stories,
//    ) {
//    }

    #[Route('/', name: 'index')]
    public function index(
        #[MapQueryParameter] int $page = 1,
        #[MapQueryParameter] int $limit = 8
    ): Response {

//        $response = $this->stories->allByContentType('post', new StoriesRequest(
//            pagination: new Pagination($page, $limit),
//            withRelations: new RelationCollection([
//                new Relation('post.author'),
//                new Relation('post.category'),
//            ])
//        ));
//
//        $posts = \array_map(static fn (array $post) => new Post($post), $response->stories);

        $posts = \array_slice(
            \array_map(static fn (array $post) => new Post($post), PostFactory::createMany(12)),
            ($page - 1) * $limit,
            $limit
        );

        return $this->render('index.html.twig', [
            'posts' => $posts,
            'page' => $page,
        ]);
    }
}