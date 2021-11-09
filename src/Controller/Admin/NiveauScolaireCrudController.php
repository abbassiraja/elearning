<?php

namespace App\Controller\Admin;

use App\Entity\NiveauScolaire;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NiveauScolaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NiveauScolaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')
            ->setBasePath('images/')
            ->setUploadDir('public/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
         TextField::new('nom'),
         TextField::new('description'),
         AssociationField::new('ecole'),
        ];
    }
    
}
