<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class MainController extends AbstractController
{
    #[Route('/')]
    public function index(TranslatorInterface $translator): Response
    {
        $form = $this->createFormBuilder()
            ->add('firstname', TextType::class, [
                'label' => $translator->trans('firstname')
            ])
            ->add('lastname', TextType::class, [
                'label' => $translator->trans('lastname')
            ])
            ->add('description', TextType::class, [
                'label' => $translator->trans('description')
            ])
            ->add('save', SubmitType::class)
            ->getForm();

        return $this->render('main/index.html.twig', compact('form'));
    }
}
