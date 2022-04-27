<?php

namespace App\Controller;

class SerieController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Serie/index.html.twig');
    }

    public function add(): string
    {
        return $this->twig->render('Serie/add.html.twig');
    }
}
