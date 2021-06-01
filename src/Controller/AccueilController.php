<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;




class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @return Response
     */
    final public function home(): Response
    {
        return $this->redirectToRoute("app_login");
    }

}