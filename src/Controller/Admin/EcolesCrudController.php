<?php

namespace App\Controller\Admin;

use App\Entity\Ecoles;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EcolesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ecoles::class;
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
            NumberField::new('lat'),
            NumberField::new('lon'),
           
        ];
    }
    
}
