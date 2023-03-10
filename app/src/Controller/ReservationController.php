<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }


    #[Route('/sendReservation', methods: ["POST"])]
    public function sendReservation(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        // Vérifiez si le formulaire a été soumis
        if ($request->isMethod('POST')) {
            // Récupérez les données du formulaire

            $formData = $request->request->all();

            $checkin_str = $formData['checkin'];
            $checkin = \DateTime::createFromFormat('Y-m-d', $checkin_str);

            $checkout_str = $formData['checkout'];
            $checkout = \DateTime::createFromFormat('Y-m-d', $checkout_str);

            if ($formData === null) {
                // Gérer l'erreur si les données du formulaire ne sont pas envoyées avec la clé attendue
                return new Response('Error: form data is missing', 400);
            }
            // On définit définit quels champs de la tables correspondent a quels champs du formulaire
            $reservation->setCheckin($checkin);
            $reservation->setCheckout($checkout);
            $reservation->setFirstname($formData['firstname']);
            $reservation->setLastname($formData['lastname']);
            $reservation->setEmail($formData['email']);
            $reservation->setPhone($formData['phone']);
            $reservation->setAdress($formData['adress']);
            $reservation->setZipcode($formData['zipcode']);
            $reservation->setCity($formData['city']);
            $reservation->setCountry($formData['country']);
            $reservation->setAdults($formData['adults']);
            $reservation->setChilds($formData['childs']);
            $reservation->setPoolAdult($formData['pool_adult']);
            $reservation->setPoolChild($formData['pool_child']);

            // Ajoutez la reservation à la base de données
            $entityManager->persist($reservation);
            $entityManager->flush();

            // Redirigez l'utilisateur vers la page d'accueil
            return $this->render('/front/home.html.twig');
        }
        // Affichez le formulaire de connexion
        return new Response('Error: HTTP method not supported', 405);
    }

}
