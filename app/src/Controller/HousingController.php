<?php

namespace App\Controller;

use App\Repository\HousingRepository;
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
}