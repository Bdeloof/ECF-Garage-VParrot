<?php

namespace App\Controller\Admin;

use App\Repository\GarageRepository;
use App\Repository\ScheduleRepository;
use App\Repository\TestimonyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdministrationController extends AbstractController
{
    #[Route('/administration', name: 'app_administration')]
    public function index(TestimonyRepository $testimonyRepository,
    GarageRepository $garageRepository,
    ScheduleRepository $scheduleRepository): Response
    {


        return $this->render('admin/index.html.twig', [
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll()
        ]);
    }
}