<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class AuthController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('admin/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
            ]);
    }

    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout()
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }


    #[Route('/registerUser', methods: ["POST"])]
    public function registerUser(Request $request, EntityManagerInterface $entityManager,UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        // Vérifiez si le formulaire a été soumis
        if ($request->isMethod('POST')) {
            // Récupérez les données du formulaire
            $formData = $request->request->all();

            if ($formData === null) {
                // Gérer l'erreur si les données du formulaire ne sont pas envoyées avec la clé attendue
                return new Response('Error: form data is missing', 400);
            }
            // On définit définit quels champs de la tables correspondent a quels champs du formulaire
            $user->setLastname($formData['lastname']);
            $user->setFirstname($formData['firstname']);
            $user->setEmail($formData['email']);
            $user->setPassword($passwordHasher->hashPassword($user, $formData['password']));
            $user->setRole($formData['form']['role']);

            // Ajoutez l'utilisateur à la base de données
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirigez l'utilisateur vers la page d'accueil
            return $this->render('/front/home.html.twig');
        }
        // Affichez le formulaire de connexion
        return new Response('Error: HTTP method not supported', 405);
    }
        //TODO gerer l'erreur de route non disponible

}