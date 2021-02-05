<?php

namespace App\Controller\Admin;

use App\Entity\Judge;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JudgeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Judge::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('first_name'),
            TextField::new('second_name'),
            TextField::new('last_name'),
            DateField::new('birth_date'),
//            TextEditorField::new('description'),
        ];
    }

}
