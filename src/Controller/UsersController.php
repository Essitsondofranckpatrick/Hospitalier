<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersType;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users")
 */
class UsersController extends AbstractController
{
    /**
     * @Route("/", name="app_users_index", methods={"GET"})
     */
    public function index(UsersRepository $usersRepository): Response
    {
        return $this->render('users/index.html.twig', [
            'users' => $usersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_users_new", methods={"GET", "POST"})
     */
    public function new(
        Request $request,
        UsersRepository $usersRepository
    ): Response {
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $user->getImage();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $entityManager = $this->getDoctrine()->getManager();
            $user->setImage($fileName);
            try {
                $file->move($this->getParameter('photos_directory'), $fileName);
            } catch (FileException $e) {
                //TODO
            }
            $entityManager->persist($user);
            $entityManager->flush();
            //$usersRepository->add($user);
            return $this->redirectToRoute(
                'app_users_index',
                [],
                Response::HTTP_SEE_OTHER
            );
        }

        return $this->render('users/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_users_show", methods={"GET"})
     */
    public function show(Users $user): Response
    {
        return $this->render('users/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_users_edit", methods={"GET", "POST"})
     */
    public function edit(
        Request $request,
        Users $user,
        UsersRepository $usersRepository
    ): Response {
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $user->getImage();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $entityManager = $this->getDoctrine()->getManager();
            $user->setImage($fileName);
            try {
                $file->move($this->getParameter('photos_directory'), $fileName);
            } catch (FileException $e) {
                //TODO
            }
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute(
                'app_users_index',
                [],
                Response::HTTP_SEE_OTHER
            );
        }

        return $this->render('users/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_users_delete", methods={"POST"})
     */
    public function delete(
        Request $request,
        Users $user,
        UsersRepository $usersRepository
    ): Response {
        if (
            $this->isCsrfTokenValid(
                'delete' . $user->getId(),
                $request->request->get('_token')
            )
        ) {
            $usersRepository->remove($user);
        }

        return $this->redirectToRoute(
            'app_users_index',
            [],
            Response::HTTP_SEE_OTHER
        );
    }
}
