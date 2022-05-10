<?php

namespace App\Controller;

use App\Model\SeenManager;

class SeenController extends AbstractController
{

    public function seen()
    {
        $seenManager = new SeenManager();
        $seen = $seenManager->selectAll();

        if(!$this->user) {
            header('Location: /login');
            return null;
        }
        
        return $this->twig->render('serie/index.html.twig', [
            'seen'=> $seen
        ]);
    }
}