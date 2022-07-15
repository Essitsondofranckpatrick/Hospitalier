<?php

namespace App\Controller;

use App\Entity\RealiserProjet;
use App\Form\RealiserProjet1Type;
use App\Repository\RealiserProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/realiser/projet")
 */
class RealiserProjetController extends AbstractController
{
    /**
     * @Route("/", name="app_realiser_projet_index", methods={"GET"})
     */
    public function index(RealiserProjetRepository $realiserProjetRepository): Response
    {
        return $this->render('realiser_projet/index.html.twig', [
            'realiser_projets' => $realiserProjetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_realiser_projet_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RealiserProjetRepository $realiserProjetRepository): Response
    {
        $realiserProjet = new RealiserProjet();
        $form = $this->createForm(RealiserProjet1Type::class, $realiserProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $realiserProjetRepository->add($realiserProjet);
            return $this->redirectToRoute('app_realiser_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('realiser_projet/new.html.twig', [
            'realiser_projet' => $realiserProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{projet}", name="app_realiser_projet_show", methods={"GET"})
     */
    public function show(RealiserProjet $realiserProjet): Response
    {
        return $this->render('realiser_projet/show.html.twig', [
            'realiser_projet' => $realiserProjet,
        ]);
    }

    /**
     * @Route("/{projet}/edit", name="app_realiser_projet_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, RealiserProjet $realiserProjet, RealiserProjetRepository $realiserProjetRepository): Response
    {
        $form = $this->createForm(RealiserProjet1Type::class, $realiserProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $realiserProjetRepository->add($realiserProjet);
            return $this->redirectToRoute('app_realiser_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('realiser_projet/edit.html.twig', [
            'realiser_projet' => $realiserProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{projet}", name="app_realiser_projet_delete", methods={"POST"})
     */
    public function delete(Request $request, RealiserProjet $realiserProjet, RealiserProjetRepository $realiserProjetRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$realiserProjet->getProjet(), $request->request->get('_token'))) {
            $realiserProjetRepository->remove($realiserProjet);
        }

        return $this->redirectToRoute('app_realiser_projet_index', [], Response::HTTP_SEE_OTHER);
    }
}
