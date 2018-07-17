<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $repository = $entityManager->getRepository(Author::class);

        var_dump($repository);

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route("/blog/page/{page<\d+>?1}", name="blog_list")
     */
    public function list($page)
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route("/blog/{blogId<\d+>}", name="get_blog")
     */
    public function getPost($blogId)
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
