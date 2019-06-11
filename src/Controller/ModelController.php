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
        $models = $modelListHandler($type, $makeCode);

        $searchLog = (new SearchLog())
            ->setVehicleType($type)
            ->setMake($makeCode)
            ->setNumberOfModels(count($models))
            ->setRequestTime($_SERVER['REQUEST_TIME'])
            ->setIpAddress($_SERVER['REMOTE_ADDR'])
            ->setUserAgent($_SERVER['HTTP_USER_AGENT']);

        $modelListHandler->saveSearchLog($searchLog);

        return $this->json($models);
    }
}
