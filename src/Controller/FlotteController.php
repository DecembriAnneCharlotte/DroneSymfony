<?php

namespace App\Controller;

use App\Entity\Flotte;
use App\Form\FlotteType;
use App\Repository\FlotteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/flotte')]
class FlotteController extends AbstractController
{
    #[Route('/', name: 'app_flotte_index', methods: ['GET'])]
    public function index(FlotteRepository $flotteRepository): Response
    {
        return $this->render('flotte/index.html.twig', [
            'flottes' => $flotteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_flotte_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $flotte = new Flotte();
        $form = $this->createForm(FlotteType::class, $flotte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($flotte);
            $entityManager->flush();

            return $this->redirectToRoute('app_flotte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('flotte/new.html.twig', [
            'flotte' => $flotte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_flotte_show', methods: ['GET'])]
    public function show(Flotte $flotte): Response
    {
        return $this->render('flotte/show.html.twig', [
            'flotte' => $flotte,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_flotte_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Flotte $flotte, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FlotteType::class, $flotte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_flotte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('flotte/edit.html.twig', [
            'flotte' => $flotte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_flotte_delete', methods: ['POST'])]
    public function delete(Request $request, Flotte $flotte, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$flotte->getId(), $request->request->get('_token'))) {
            $entityManager->remove($flotte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_flotte_index', [], Response::HTTP_SEE_OTHER);
    }
}
