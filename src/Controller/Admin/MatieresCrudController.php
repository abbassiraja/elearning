<?php

namespace App\Controller\Admin;

use App\Entity\Matieres;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MatieresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Matieres::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')
            ->setBasePath('images/')
            ->setUploadDir('public/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
         TextField::new('nom'),
         AssociationField::new('niveauscolaire'),
        ];
    }
    
}
