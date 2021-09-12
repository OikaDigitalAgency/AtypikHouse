<?php


namespace App\Controller;

use App\Entity\Houses;

class HousesPublishController{

/*Affiche la nouvelle requete dans l'API*/
    public function __invoke(Houses $data): Houses{

        $data->setOnline(true);
        return $data;


}
}