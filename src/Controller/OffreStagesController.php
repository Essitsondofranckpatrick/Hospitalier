<?php

namespace App\Controller;

use App\Entity\OffreStages;
use App\Form\OffreStagesType;
use App\Repository\OffreStagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offre/stages")
 */
class OffreStagesController extends AbstractController
{
    /**
     * @Route("/", name="app_offre_stages_index", methods={"GET"})
     */
    public function index(OffreStagesRepository $offreStagesRepository): Response
    {
        return $this->render('offre_stages/index.html.twig', [
            'offre_stages' => $offreStagesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_offre_stages_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OffreStagesRepository $offreStagesRepository): Response
    {
        $offreStage = new OffreStages();
        $form = $this->createForm(OffreStagesType::class, $offreStage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offreStagesRepository->add($offreStage);
            return $this->redirectToRoute('app_offre_stages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offre_stages/new.html.twig', [
            'offre_stage' => $offreStage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{projet}", name="app_offre_stages_show", methods={"GET"})
     */
    public function show(OffreStages $offreStage): Response
    {
        return $this->render('offre_stages/show.html.twig', [
            'offre_stage' => $offreStage,
        ]);
    }

    /**
     * @Route("/{projet}/edit", name="app_offre_stages_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OffreStages $offreStage, OffreStagesRepository $offreStagesRepository): Response
    {
        $form = $this->createForm(OffreStagesType::class, $offreStage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offreStagesRepository->add($offreStage);
            return $this->redirectToRoute('app_offre_stages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offre_stages/edit.html.twig', [
            'offre_stage' => $offreStage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{projet}", name="app_offre_stages_delete", methods={"POST"})
     */
    public function delete(Request $request, OffreStages $offreStage, OffreStagesRepository $offreStagesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offreStage->getProjet(), $request->request->get('_token'))) {
            $offreStagesRepository->remove($offreStage);
        }

        return $this->redirectToRoute('app_offre_stages_index', [], Response::HTTP_SEE_OTHER);
    }
}
