<?php

namespace App\Controller\Admin;

use App\Entity\Housing;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HousingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Housing::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('ID')->hideOnForm(),
            TextField::new('name'),
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
////            TextEditorField::new('owner')->,
//            DateTimeField::new('created_at'),
//            DateTimeField::new('updated_at')
        ];
    }

//    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
//    {
//        if (!$entityInstance instanceof Housing) return;
//        $entityInstance->setcreatedAt(new \DateTimeImmutable);
//        parent::persistEntity($em, $entityInstance);
//    }

}
