<?php

namespace App\Controller;

use App\Entity\Themes;
use App\Form\ThemesType;
use App\Repository\ThemesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/themes")
 */
class ThemesController extends AbstractController
{
    /**
     * @Route("/", name="app_themes_index", methods={"GET"})
     */
    public function index(ThemesRepository $themesRepository): Response
    {
        return $this->render('themes/index.html.twig', [
            'themes' => $themesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_themes_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ThemesRepository $themesRepository): Response
    {
        $theme = new Themes();
        $form = $this->createForm(ThemesType::class, $theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themesRepository->add($theme);
            return $this->redirectToRoute('app_themes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('themes/new.html.twig', [
            'theme' => $theme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_themes_show", methods={"GET"})
     */
    public function show(Themes $theme): Response
    {
        return $this->render('themes/show.html.twig', [
            'theme' => $theme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_themes_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Themes $theme, ThemesRepository $themesRepository): Response
    {
        $form = $this->createForm(ThemesType::class, $theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themesRepository->add($theme);
            return $this->redirectToRoute('app_themes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('themes/edit.html.twig', [
            'theme' => $theme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_themes_delete", methods={"POST"})
     */
    public function delete(Request $request, Themes $theme, ThemesRepository $themesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$theme->getId(), $request->request->get('_token'))) {
            $themesRepository->remove($theme);
        }

        return $this->redirectToRoute('app_themes_index', [], Response::HTTP_SEE_OTHER);
    }
}
