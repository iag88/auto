<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VehicleTypeController extends AbstractController
{
    /**
     * @Route("/vehicle/type", name="vehicle_type")
     */
    public function index()
    {
        return $this->render('vehicle_type/index.html.twig', [
            'controller_name' => 'VehicleTypeController',
        ]);
    }
}
