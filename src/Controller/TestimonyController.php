<?php

namespace App\Controller;

use App\Entity\Testimony;
use App\Form\TestimonyType;
use App\Repository\GarageRepository;
use App\Repository\ScheduleRepository;
use App\Repository\TestimonyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestimonyController extends AbstractController
{
    #[Route('/testimony', name: 'app_testimony')]
    public function index(TestimonyRepository $testimonyRepository, GarageRepository $garageRepository, ScheduleRepository $scheduleRepository, Request $request, EntityManagerInterface $em): Response
    {
        return $this->render('testimony/index.html.twig', [
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll()
        ]);
    }

    #[Route('/add/testimony', name: 'app_add_testimony')]
    public function add(TestimonyRepository $testimonyRepository, GarageRepository $garageRepository, ScheduleRepository $scheduleRepository, Request $request, EntityManagerInterface $em): Response
    {
        $testimony = new Testimony;

        $testimonyForm = $this->createForm(TestimonyType::class, $testimony);

        $testimonyForm->handleRequest($request);

        if($testimonyForm->isSubmitted() && $testimonyForm->isValid()){
            $em->persist($testimony);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('testimony/add.html.twig', [
            'testimonyForm' => $testimonyForm->createView(),
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll()
        ]);
    }
}
