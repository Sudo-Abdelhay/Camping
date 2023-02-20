<?php

namespace App\Controller\Admin;

use App\Entity\Housing;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Core\Security;


class HousingCrudController extends AbstractCrudController
{

    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getEntityFqcn(): string
    {
        return Housing::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $user = $this->security->getUser();
        $userId = $user ? $user->getId() : null;

        return [
            IdField::new('ID')->hideOnForm(),
            TextField::new('title'),
            TextField::new('description'),
            IntegerField::new('capacity'),
            ImageField::new('image')
                ->setBasePath('public/images/housing')
                ->setUploadDir('public/images/housing'),
            BooleanField::new('active'),
            IntegerField::new('surface'),
            ChoiceField::new('type')
                ->renderExpanded()
                ->setChoices([  'MobileHome' => 'MobileHome',
                                'Emplacement' => 'Emplacement',
                                'Caravane' => 'Caravane']
                ),
            MoneyField::new('price')->setCurrency('EUR'),
            IdField::new('user')
                ->hideOnForm()
                ->setValue($userId),
        ];
    }
}
