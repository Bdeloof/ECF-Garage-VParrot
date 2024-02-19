<?php

namespace App\Controller;

use App\Repository\GarageRepository;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ScheduleController extends AbstractController
{
    #[Route('/schedule', name: 'app_schedule')]
    public function index(GarageRepository $garageRepository, ScheduleRepository $scheduleRepository): Response
    {
        return $this->render('schedule/index.html.twig', [
            'controller_name' => 'ScheduleController',
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll()
        ]);
    }
}
