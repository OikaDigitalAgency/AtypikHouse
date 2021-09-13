<?php


namespace App\Controller;

use App\Entity\Houses;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;


#[AsController]
class HousesPublishController extends AbstractController{

/*Affiche la nouvelle requete dans l'API*/


    public function __invoke(Houses $data): Houses
    {
        $this->HousesPublishController->handle($data);

        return $data;
    }
}