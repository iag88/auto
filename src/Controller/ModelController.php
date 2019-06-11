<?php

namespace App\Controller;

use App\Handler\ModelListHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ModelController extends AbstractController
{
    /**
     * @Route("/models/{type}/{makeCode}", name="model_list")
     */
    public function index(ModelListHandler $modelListHandler, int $type, int $makeCode)
    {
        $models = $modelListHandler($type, $makeCode);

        return $this->json($models, Response::HTTP_OK, ['X-ITEMS-COUNT' => count($models)]);
    }
}
