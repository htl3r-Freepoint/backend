<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class KasseController extends AbstractController
{
    /**
     * @Route("/kasse", name="kasse")
     */
    public function index()
    {
        return $this->render('kasse/index.html.twig', [
            'controller_name' => 'KasseController',
        ]);
    }
}
