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

        $picture = $request->files->get('picture');
        dd($picture, $houses);
    }

}