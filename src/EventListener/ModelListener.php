<?php

namespace App\EventListener;

use App\Entity\SearchLog;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ModelListener
{
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $type = $event->getRequest()->attributes->get('type');
        $makeCode = $event->getRequest()->attributes->get('makeCode');

        $models = json_decode($event->getResponse());

        $searchLog = (new SearchLog())
            ->setVehicleType($type)
            ->setMake($makeCode)
            ->setNumberOfModels(count($models))
            ->setRequestTime($_SERVER['REQUEST_TIME'])
            ->setIpAddress($_SERVER['REMOTE_ADDR'])
            ->setUserAgent($_SERVER['HTTP_USER_AGENT']);

        $this->manager->persist($searchLog);
        $this->manager->flush();
    }
}
