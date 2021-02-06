<?php

namespace App\Controller\Admin;

use App\Entity\Judge;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

class JudgeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Judge::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('first_name'),
            TextField::new('second_name'),
            TextField::new('last_name'),
            DateField::new('birth_date'),
            AssociationField::new('graduationUniversity'),
            DateField::new('graduationDate'),
            DateField::new('sinceJudge'),
            DateField::new('sinceCurrentCourt'),
            AssociationField::new('position'),
            AssociationField::new('delegatedTo'),
            AssociationField::new('delegatedFrom'),
            AssociationField::new('workplace'),
            AssociationField::new('nameDivision'),
            NumberField::new('numberDivision'),
            TextEditorField::new('additionalInformation'),
        ];
    }

}
