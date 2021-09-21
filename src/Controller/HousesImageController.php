<?php

namespace App\Controller;

use App\Entity\Houses;
use Symfony\Component\HttpFoundation\Request;

class HousesImageController{

    public function __invoke(Request $request){
        $houses = $request ->attributes->get('data');

        if (!($houses instanceof Houses)){
                throw new \RuntimeException('erreur');
            }

        $houses->setFile( $request->files->get('file'));
        $houses->setUpdatedAt(new \DateTime());
        return $houses;
    }

}