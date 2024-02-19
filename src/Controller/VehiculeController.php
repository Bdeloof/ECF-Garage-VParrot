<?php

namespace App\Controller;

use App\Entity\Announcement;
use App\Form\AnnouncementType;
use App\Repository\AnnouncementRepository;
use App\Repository\GarageRepository;
use App\Repository\ScheduleRepository;
use App\Repository\TestimonyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VehiculeController extends AbstractController
{
    #[Route('/vehicule', name: 'app_vehicule')]
    public function index(TestimonyRepository $testimonyRepository,
    GarageRepository $garageRepository,
    ScheduleRepository $scheduleRepository,
    AnnouncementRepository $announcementRepository): Response
    {
        return $this->render('vehicule/index.html.twig', [
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll(),
            'announcement' => $announcementRepository->findAll()
        ]);
    }

    #[Route('/vehicule/add', name: 'app_vehicule_add')]
    public function add(TestimonyRepository $testimonyRepository,
    GarageRepository $garageRepository,
    ScheduleRepository $scheduleRepository,
    AnnouncementRepository $announcementRepository): Response
    {

        $announcement = new Announcement();

        $announcementForm = $this->createForm(AnnouncementType::class, $announcement);

        return $this->render('vehicule/add.html.twig', [
            'announcementForm' => $announcementForm->createView(),
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll(),
            'announcement' => $announcementRepository->findAll()
        ]);
    }
}
