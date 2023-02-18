<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function HomeView()
    {
        return $this->render("front/home.html.twig");
    }

    #[Route('/login')]
    public function LoginView()
    {
        return $this->render("admin/login.html.twig");
    }

    #[Route('/register')]
    public function RegisterView()
    {
        return $this->render("admin/register.html.twig");
    }

}