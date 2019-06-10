<?php

namespace App\Controller;

use App\Handler\MakeListHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MakeController extends AbstractController
{
    /**
     * @Route("/makes/{type}", name="make_list")
     */
    public function index(MakeListHandler $makeListHandler, string $type)
    {
        return $this->render('make/index.html.twig', [
            'makes' => $makeListHandler($type),
        ]);
    }
}
