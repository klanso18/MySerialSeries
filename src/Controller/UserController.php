<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $credentials = array_map('trim', $_POST);
            $userManager = new UserManager();
            $user = $userManager->selectOneByEmail($credentials['email']);

            if ($user && password_verify($credentials['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /');
                exit();
            }
            
            return $this->twig->render('user/login.html.twig');
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        header('Location: /');
        exit();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = $_POST;
            $userManager = new UserManager();
            if ($userManager->insert($credentials)) {
                return $this->login();
            }
        }
        return $this->twig->render('user/register.html.twig');
    }
}
