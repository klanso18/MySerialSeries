<?php

namespace App\Controller;

class UserController extends AbstractController
{
    public function login()
    {
        return $this->twig->render('user/login.html.twig');
    }

    public function logout()
    {
        header('Location: /');
        return null;
    }

    public function register()
    {
        return $this->twig->render('user/register.html.twig');
    }
}