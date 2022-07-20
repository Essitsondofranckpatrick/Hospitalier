<?php

namespace App\Controller;

use App\Entity\Interactions;
use App\Form\InteractionsType;
use App\Repository\InteractionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/interactions")
 */
class InteractionsController extends AbstractController
{
    /**
     * @Route("/", name="app_interactions_index", methods={"GET"})
     */
    public function index(InteractionsRepository $interactionsRepository): Response
    {
        return $this->render('interactions/index.html.twig', [
            'interactions' => $interactionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_interactions_new", methods={"GET", "POST"})
     */
    public function new(Request $request, InteractionsRepository $interactionsRepository): Response
    {
        $interaction = new Interactions();
        $form = $this->createForm(InteractionsType::class, $interaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $interactionsRepository->add($interaction);
            return $this->redirectToRoute('app_interactions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('interactions/new.html.twig', [
            'interaction' => $interaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_interactions_show", methods={"GET"})
     */
    public function show(Interactions $interaction): Response
    {
        return $this->render('interactions/show.html.twig', [
            'interaction' => $interaction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_interactions_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Interactions $interaction, InteractionsRepository $interactionsRepository): Response
    {
        $form = $this->createForm(InteractionsType::class, $interaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $interactionsRepository->add($interaction);
            return $this->redirectToRoute('app_interactions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('interactions/edit.html.twig', [
            'interaction' => $interaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_interactions_delete", methods={"POST"})
     */
    public function delete(Request $request, Interactions $interaction, InteractionsRepository $interactionsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interaction->getId(), $request->request->get('_token'))) {
            $interactionsRepository->remove($interaction);
        }

        return $this->redirectToRoute('app_interactions_index', [], Response::HTTP_SEE_OTHER);
    }
}
