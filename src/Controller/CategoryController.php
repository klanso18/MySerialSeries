<?php

namespace App\Controller;

class CategoryController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('category/category.html.twig');
    }
}
