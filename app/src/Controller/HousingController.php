<?php

namespace App\Controller;

use App\Repository\HousingRepository;
use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\VarDateTimeImmutableType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HousingController extends AbstractController
{
    #[Route('/housing', name: 'housings')]
    public function index(HousingRepository $housingRepository): Response
    {
        $housings = $housingRepository->findAll();

        return $this->render('front/housing.html.twig', [
            'housings' => $housings,
        ]);
    }

    #[Route('/reservation{id}')]
    public function reservation(HousingRepository $housingRepository, $id): Response
    {
        $reservation = $housingRepository->find($id);

        return $this->render("front/reservation.twig", [
            'housing' => $reservation,
    ]);
    }


}