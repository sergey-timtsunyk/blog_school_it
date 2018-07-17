<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /**
     * @var \App\Repository\AuthorRepository
     */
    private $repositoryAuthor;

    /**
     * @var \App\Repository\PostRepository
     */
    private $repositoryPost;

    /**
     * MainController constructor.
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->repositoryAuthor = $objectManager->getRepository(Author::class);
        $this->repositoryPost = $objectManager->getRepository(Post::class);
    }

    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        $authors = $this->repositoryAuthor->findAll();
        $posts = $this->repositoryPost->findAll();

        return $this->render('main/index.html.twig',
            compact('authors', 'posts')
        );
    }
}
