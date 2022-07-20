<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Themes;
use App\Entity\Users;
use App\Entity\Interactions;
use App\Entity\Projects;
use App\Entity\AchievedProjects;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name = "home")
     */
    public function home()
    {
        $themes = $this->getDoctrine()
            ->getRepository(Themes::class)
            ->findAll();
        $temoignages = $this->getDoctrine()
            ->getRepository(Interactions::class)
            ->findByType('Temoignage');
        return $this->render('front/index.html.twig', [
            'themes' => $themes,
            'temoignages' => $temoignages,
        ]);
    }

    /**
     * @Route("/quotes", name = "quotes")
     */
    public function quotes()
    {
        return $this->render('front/quote.html.twig');
    }

    /**
     * @Route("/team", name = "team")
     */
    public function team()
    {
        $membres = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findAll();
        return $this->render('front/team.html.twig', [
            'membres' => $membres,
        ]);
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
        $projets = $this->getDoctrine()
            ->getRepository(Projects::class)
            ->findAll();
        return $this->render('front/projet.html.twig', [
            'projets' => $projets,
        ]);
    }

    /**
     * @Route("/offres", name = "offres")
     */
    public function offres()
    {
        $offres = $this->getDoctrine()
            ->getRepository(Projects::class)
            ->findByOffreStage(true);
        return $this->render('front/offres.html.twig', [
            'offres' => $offres,
        ]);
    }

    /**
     * @Route("/themes_front", name ="themes")
     */
    public function themes()
    {
        $themes = $this->getDoctrine()
            ->getRepository(Themes::class)
            ->findAll();
        $temoignages = $this->getDoctrine()
            ->getRepository(Interactions::class)
            ->findAll();
        return $this->render('front/themes.html.twig', [
            'themes' => $themes,
            'temoignages' => $temoignages,
        ]);
    }
    /**
     * @Route("/login", name = "login")
     */
    public function login()
    {
        return $this->render('back/login.html.twig');
    }
    /**
     * @Route("/back", name = "back")
     */
    public function back()
    {
        return $this->render('back/index.html.twig');
    }

    /**
     * @Route("/calendar", name = "calendar")
     */
    public function calendar()
    {
        return $this->render('back/calendar.html.twig');
    }
    /**
     * @Route("/email", name = "email")
     */
    public function email()
    {
        return $this->render('back/email.html.twig');
    }
    /**
     * @Route("/profile", name = "profile")
     */
    public function profile()
    {
        return $this->render('back/profile.html.twig');
    }
    /**
     * @Route("/map", name = "map")
     */
    public function map()
    {
        return $this->render('back/map.html.twig');
    }
    /**
     * @Route("/settings", name = "settings")
     */
    public function settings()
    {
        return $this->render('back/settings.html.twig');
    }
    /**
     * @Route("/help", name = "help")
     */
    public function help()
    {
        return $this->render('back/index.html.twig');
    }
    /**
     * @Route("/charts", name = "charts")
     */
    public function charts()
    {
        return $this->render('back/charts.html.twig');
    }
    /**
     * @Route("/projet", name = "projet")
     */
    public function projet()
    {
        return $this->render('back/project.html.twig');
    }
    /**
     * @Route("/contactback", name = "contactback")
     */
    public function contactback()
    {
        return $this->render('back/contact.html.twig');
    }
}

?>
