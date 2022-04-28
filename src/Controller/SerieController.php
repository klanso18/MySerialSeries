<?php

namespace App\Controller;

use App\Model\SerieManager;

class SerieController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Serie/index.html.twig');
    }

    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serie = array_map('trim', $_POST);

            $fileName = $_FILES['image']['name'];
            $uploadFile = __DIR__ . '/../../public/uploads/' . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $serieManager = new SerieManager();
                $serie['image'] = $fileName;
                $id = $serieManager->insert($serie);
                header('Location:/serie?id=' . $id);
                return null;
            }
        }
        return $this->twig->render('Serie/add.html.twig');
    }
}
