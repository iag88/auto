<?php

namespace App\Controller;

use App\Entity\Make;
use App\Handler\MakeListHandler;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MakeController extends AbstractController
{
    /**
     * @Route("/makes/{type}", name="make_list")
     */
    public function index(MakeListHandler $makeListHandler, int $type, ObjectManager $manager)
    {
        return $this->render('make/index.html.twig', [
            'makes' => $makeListHandler($type),
        ]);
    }
}
