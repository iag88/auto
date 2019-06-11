<?php

namespace App\Controller;

use App\Handler\ModelListHandler;
use App\Entity\SearchLog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ModelController extends AbstractController
{
    /**
     * @Route("/models/{type}/{makeCode}", name="model_list")
     */
    public function index(ModelListHandler $modelListHandler, string $type, string $makeCode)
    {
        return $this->json($modelListHandler($type, $makeCode));
    }
}
