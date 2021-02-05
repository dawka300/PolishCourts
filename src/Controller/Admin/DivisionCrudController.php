<?php

namespace App\Controller\Admin;

use App\Entity\Division;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DivisionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Division::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('divisionName')->setLabel('Nazwa wydziału'),
            TextField::new('divisionCode')->setLabel('Kod wydziału'),
        ];
    }

}
