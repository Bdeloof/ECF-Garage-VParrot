<?php

namespace App\Controller;

use App\Repository\AnnouncementRepository;
use App\Repository\GarageRepository;
use App\Repository\ScheduleRepository;
use App\Repository\TestimonyRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/employee', name: 'app_employee')]
    public function index(TestimonyRepository $testimonyRepository,
    GarageRepository $garageRepository,
    ScheduleRepository $scheduleRepository,
    AnnouncementRepository $announcementRepository,
    UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'user' => $userRepository->findAll(),
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll(),
            'announcement' => $announcementRepository->findAll()
        ]);
    }
}
