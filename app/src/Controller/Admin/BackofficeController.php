<?php

namespace App\Controller\Admin;

use App\Entity\Housing;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackofficeController extends AbstractDashboardController
{


    public function __construct( private AdminUrlGenerator $adminUrlGenerator)
    {
        
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(HousingCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfo');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Logements');

        yield MenuItem::subMenu('Ma gestion', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un logement', 'fas fa-plus', Housing::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir mes logements', 'fas fa-eye', Housing::class)
        ]);
    }
}
