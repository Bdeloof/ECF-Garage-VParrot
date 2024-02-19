<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\Testimony;
use App\Form\ServiceType;
use App\Repository\GarageRepository;
use App\Repository\ScheduleRepository;
use App\Repository\ServiceRepository;
use App\Repository\TestimonyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(TestimonyRepository $testimonyRepository,
    GarageRepository $garageRepository,
    ScheduleRepository $scheduleRepository,
    ServiceRepository $serviceRepository): Response
    {
        return $this->render('service/index.html.twig', [
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll(),
            'service' => $serviceRepository->findAll()
        ]);
    }

    #[Route('/add/service', name: 'app_add_service')]
    public function add(TestimonyRepository $testimonyRepository,
    GarageRepository $garageRepository,
    ScheduleRepository $scheduleRepository,
    ServiceRepository $serviceRepository, Request $request, EntityManagerInterface $em): Response
    {
        $service = new Service;

        $serviceForm = $this->createForm(ServiceType::class, $service);

        $serviceForm->handleRequest($request);

        if($serviceForm->isSubmitted() && $serviceForm->isValid()){
            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }
    {
        return $this->render('service/add.html.twig', [
            'serviceForm' => $serviceForm->createView(),
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll(),
            'service' => $serviceRepository->findAll()
        ]);
    }
}

}