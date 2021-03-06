<?php

namespace App\Controller\Admin;

use App\Entity\Publicite;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PubliciteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Publicite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')
            ->setBasePath('images/')
            ->setUploadDir('public/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
         AssociationField::new('ecole'),
         
         TextField::new('description'),
         NumberField::new('numero_telephone'),
         EmailField::new('email'),
        ];
    }
    
}
