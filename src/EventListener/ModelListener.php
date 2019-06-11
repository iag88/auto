<?php

namespace App\EventListener;

use App\Entity\SearchLog;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

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

    public function onKernelResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();
        if (!$response->headers->has('X-ITEMS-COUNT')) {
            return;
        }

        $type = $event->getRequest()->attributes->get('type');
        $makeCode = $event->getRequest()->attributes->get('makeCode');

        $searchLog = (new SearchLog())
            ->setVehicleType($type)
            ->setMake($makeCode)
            ->setNumberOfModels($response->headers->get('X-ITEMS-COUNT'))
            ->setRequestTime($_SERVER['REQUEST_TIME'])
            ->setIpAddress($_SERVER['REMOTE_ADDR'])
            ->setUserAgent($_SERVER['HTTP_USER_AGENT']);

        $this->manager->persist($searchLog);
        $this->manager->flush();
    }
}
