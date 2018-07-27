<?php
/**
 * User: Serhii T.
 * Date: 7/24/18
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $roles = [
            'Admin' => 'ROLE_ADMIN',
            'Author' => 'ROLE_AUTHOR',
            'Moderator' => 'ROLE_MODERATOR',
        ];

        $formMapper->add('username')
            ->add('email')
            ->add('plainPassword', RepeatedType::class, array(
                'required' => false,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('enabled')
            ->add('roles', ChoiceType::class, ['choices' => $roles, 'multiple' => true ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('username')
            ->add('email');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->addIdentifier('username')
            ->add('email')
            ->add('enabled')
            ->add('roles', 'string', ['template' => 'admin/list_roles.html.twig'])
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                )
            ))
        ;
    }
}
