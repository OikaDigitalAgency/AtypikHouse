<?php

namespace App\Controller;

use App\Entity\Houses;
use http\Env\Request;

class HousesImageController{

    public function __invoke(Request $request){
        $houses = $request ->attributes->get('data');

        if (!($houses instanceof Houses)){
                throw new \RuntimeException('erreur');
            }

        $file = $request->listidPics->get('listidPics');
        dd($file, $houses);
    }

}