<?php

namespace App\Controller;

use App\Model\CategoryManager;
use App\Model\SerieManager;

class SerieController extends AbstractController
{
    public function index(): string
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectDistinctAll();
        $serieManager = new SerieManager();
        $series = $serieManager->selectAll();
        return $this->twig->render('Serie/index.html.twig', [
            'categories' => $categories,
            'series' => $series
        ]);
    }

    /**
     * Show informations for a specific item
     */
    // public function show(int $id): string
    // {
    //     $serieManager = new SerieManager();
    //     $serie = $serieManager->selectOneById($id);

    //     return $this->twig->render('Serie/index.html.twig', ['serie' => $serie]);
    // }


    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serie = array_map('trim', $_POST);

            $fileName = $_FILES['image']['name'];
            $uploadFile = __DIR__ . '/../../public/uploads/' . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $serieManager = new SerieManager();
                $serie['image'] = $fileName;
                $serieManager->insert($serie);
                header('Location:/category');
                return null;
            }
        }
        $categoryManager = new CategoryManager();
        return $this->twig->render('Serie/add.html.twig', [
            'categories' => $categoryManager->selectAll()
        ]);
    }
}
