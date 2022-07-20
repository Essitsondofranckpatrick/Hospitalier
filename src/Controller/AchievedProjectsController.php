<?php

namespace App\Controller;

use App\Entity\AchievedProjects;
use App\Form\AchievedProjectsType;
use App\Repository\AchievedProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/achieved/projects")
 */
class AchievedProjectsController extends AbstractController
{
    /**
     * @Route("/", name="app_achieved_projects_index", methods={"GET"})
     */
    public function index(AchievedProjectsRepository $achievedProjectsRepository): Response
    {
        return $this->render('achieved_projects/index.html.twig', [
            'achieved_projects' => $achievedProjectsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_achieved_projects_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AchievedProjectsRepository $achievedProjectsRepository): Response
    {
        $achievedProject = new AchievedProjects();
        $form = $this->createForm(AchievedProjectsType::class, $achievedProject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $achievedProjectsRepository->add($achievedProject);
            return $this->redirectToRoute('app_achieved_projects_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('achieved_projects/new.html.twig', [
            'achieved_project' => $achievedProject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_achieved_projects_show", methods={"GET"})
     */
    public function show(AchievedProjects $achievedProject): Response
    {
        return $this->render('achieved_projects/show.html.twig', [
            'achieved_project' => $achievedProject,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_achieved_projects_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, AchievedProjects $achievedProject, AchievedProjectsRepository $achievedProjectsRepository): Response
    {
        $form = $this->createForm(AchievedProjectsType::class, $achievedProject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $achievedProjectsRepository->add($achievedProject);
            return $this->redirectToRoute('app_achieved_projects_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('achieved_projects/edit.html.twig', [
            'achieved_project' => $achievedProject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_achieved_projects_delete", methods={"POST"})
     */
    public function delete(Request $request, AchievedProjects $achievedProject, AchievedProjectsRepository $achievedProjectsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$achievedProject->getId(), $request->request->get('_token'))) {
            $achievedProjectsRepository->remove($achievedProject);
        }

        return $this->redirectToRoute('app_achieved_projects_index', [], Response::HTTP_SEE_OTHER);
    }
}
