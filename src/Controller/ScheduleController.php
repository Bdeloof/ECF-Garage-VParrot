<?php

namespace App\Controller;

use App\Entity\Schedule;
use App\Form\ScheduleType;
use App\Form\ServiceType;
use App\Repository\GarageRepository;
use App\Repository\ScheduleRepository;
use App\Repository\ServiceRepository;
use App\Repository\TestimonyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/add/schedule', name: 'app_modify_schedule')]
    public function modify(TestimonyRepository $testimonyRepository,
    GarageRepository $garageRepository,
    ScheduleRepository $scheduleRepository,
    ServiceRepository $serviceRepository, Request $request, EntityManagerInterface $em): Response
    {
        $schedule = new Schedule;

        $scheduleForm = $this->createForm(ScheduleType::class, $schedule);

        $scheduleForm->handleRequest($request);

        if($scheduleForm->isSubmitted() && $scheduleForm->isValid()){
            $em->persist($schedule);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }
    {
        return $this->render('schedule/add.html.twig', [
            'scheduleForm' => $scheduleForm->createView(),
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll(),
            'service' => $serviceRepository->findAll()
        ]);
    }
}

}