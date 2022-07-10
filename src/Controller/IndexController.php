<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name = "home")
     */
    public function home()
    {
        return $this->render('front/index.html.twig');
    }
    /**
     * @Route("/team", name = "team")
     */
    public function team()
    {
        return $this->render('front/team.html.twig');
    }
    /**
     * @Route("/about", name = "about")
     */
    public function about()
    {
        return $this->render('front/about.html.twig');
    }
    /**
     * @Route("/blog", name = "blog")
     */
    public function blog()
    {
        return $this->render('front/blog.html.twig');
    }
    /**
     * @Route("/contact", name = "contact")
     */
    public function contact()
    {
        return $this->render('front/contact.html.twig');
    }
    /**
     * @Route("/project", name = "project")
     */
    public function project()
    {
        return $this->render('front/project.html.twig');
    }
    /**
     * @Route("/services", name = "services")
     */
    public function services()
    {
        return $this->render('front/services.html.twig');
    }
    /**
     * @Route("/back", name = "back")
     */
    public function back()
    {
        return $this->render('back/index.html.twig');
    }
}

?>
