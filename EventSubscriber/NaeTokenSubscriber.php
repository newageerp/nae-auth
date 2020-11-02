<?php

namespace NaeSymfonyBundles\NaeAuthBundle\EventSubscriber;

use NaeSymfonyBundles\NaeAuthBundle\Controller\NaeTokenAuthControllerInterface;
use NaeSymfonyBundles\NaeAuthBundle\Service\NaeAuthService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class NaeTokenSubscriber implements EventSubscriberInterface
{

    /**
     * @var string $key
     */
    private $key;

    public function __construct()
    {
        $this->key = $_ENV['AUTH_KEY'];
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    /**
     * @param ControllerEvent $event
     */
    public function onKernelController(ControllerEvent $event): void
    {
        $controller = $event->getController();

        // when a controller class defines multiple action methods, the controller
        // is returned as [$controllerInstance, 'methodName']
        if (is_array($controller)) {
            $controller = $controller[0];
        }

        if ($controller instanceof NaeTokenAuthControllerInterface) {
            $service = new NaeAuthService();

            $token = $event->getRequest()->headers->get('Authorization');
            $user = $service->decrypt($token);
            if (!$user) {
                throw new AccessDeniedHttpException('This action needs a valid token!');
            }
            $controller->setNaeUser($user);
        }
    }
}
