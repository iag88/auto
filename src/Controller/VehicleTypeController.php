<?php

namespace App\Controller;

use App\Repository\VehicleTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VehicleTypeController extends AbstractController
{
    /**
     * @Route("/", name="vehicle_type_list")
     */
    public function index(VehicleTypeRepository $repository)
    {
        $vehicleTypes = $repository->findBy(
            [],
            ['description' => 'ASC']
        );
        var_dump($vehicleTypes);

        return $this->render('vehicle_type/index.html.twig', [
            'vehicleTypes' => $vehicleTypes,
        ]);
    }
}
