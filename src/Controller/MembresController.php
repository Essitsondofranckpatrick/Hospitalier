<?php

namespace App\Controller;

use App\Entity\Membres;
use App\Form\MembresType;
use App\Repository\MembresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/membres")
 */
class MembresController extends AbstractController
{
    /**
     * @Route("/", name="app_membres_index", methods={"GET"})
     */
    public function index(MembresRepository $membresRepository): Response
    {
        return $this->render('membres/index.html.twig', [
            'membres' => $membresRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_membres_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MembresRepository $membresRepository): Response
    {
        $membre = new Membres();
        $form = $this->createForm(MembresType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membresRepository->add($membre);
            return $this->redirectToRoute('app_membres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('membres/new.html.twig', [
            'membre' => $membre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_membres_show", methods={"GET"})
     */
    public function show(Membres $membre): Response
    {
        return $this->render('membres/show.html.twig', [
            'membre' => $membre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_membres_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Membres $membre, MembresRepository $membresRepository): Response
    {
        $form = $this->createForm(MembresType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membresRepository->add($membre);
            return $this->redirectToRoute('app_membres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('membres/edit.html.twig', [
            'membre' => $membre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_membres_delete", methods={"POST"})
     */
    public function delete(Request $request, Membres $membre, MembresRepository $membresRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$membre->getId(), $request->request->get('_token'))) {
            $membresRepository->remove($membre);
        }

        return $this->redirectToRoute('app_membres_index', [], Response::HTTP_SEE_OTHER);
    }
}
