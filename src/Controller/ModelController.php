<?php

namespace App\Controller;

use App\Handler\ModelListHandler;
use App\Entity\SearchLog;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
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

        $searchLog = new SearchLog();
        $searchLog->setVehicleType($type);
        $searchLog->setMake($makeCode);
        $searchLog->setNumberOfModels(count($models));
        $searchLog->setRequestTime($_SERVER['REQUEST_TIME']);
        $searchLog->setIpAddress($_SERVER['REMOTE_ADDR']);
        $searchLog->setUserAgent($_SERVER['HTTP_USER_AGENT']);

        $modelListHandler->saveSearchLog($searchLog);

        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        $jsonContent = $serializer->serialize($models, 'json');

        return new Response($jsonContent);
    }
}
