<?php

namespace App\Controller;

use App\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    /**
     * @Route("/post/{key}", name="post_path")
     * @ParamConverter("post", options={"mapping": {"key": "path"}})
     */
    public function index(Post $post)
    {
        return $this->render('post/index.html.twig', compact('post'));
    }
}
