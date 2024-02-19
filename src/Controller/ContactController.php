<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\GarageRepository;
use App\Repository\ScheduleRepository;
use App\Repository\TestimonyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(TestimonyRepository $testimonyRepository,
    GarageRepository $garageRepository,
    ScheduleRepository $scheduleRepository,
    Request $request,
    EntityManagerInterface $em): Response
    {

        $contact = new Contact;

        $contactForm = $this->createForm(ContactType::class, $contact);

        $contactForm->handleRequest($request);

        if($contactForm->isSubmitted() && $contactForm->isValid()){
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $contactForm->createView(),
            'testimony' => $testimonyRepository->findBy([],
            ['testimonyOrder' => 'asc']), 
            'garage' => $garageRepository->findAll(),
            'schedule' => $scheduleRepository->findAll()
        ]);
    }
}
