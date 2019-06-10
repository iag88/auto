<?php

namespace App\Controller;

use App\Handler\VehicleTypeListHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VehicleTypeController extends AbstractController
{
    /**
     * @Route("/", name="vehicle_type_list")
     */
    public function index(VehicleTypeListHandler $vehicleTypeListHandler)
    {
        return $this->render('vehicle_type/index.html.twig', [
            'vehicle_types' => $vehicleTypeListHandler(),
        ]);
    }
}
