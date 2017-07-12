<?php


namespace AppBundle\Service;


use GraphQL\Type\Definition\Config;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class GraphQLRequestResponseSubscriber implements EventSubscriberInterface {
    private static $phpErrors = [];

    /**
     * @return array
     */
    public static function getSubscribedEvents() {
        return array(
            KernelEvents::REQUEST => array(
                array('enableDebug', 0)
            ),
            KernelEvents::VIEW => array(
                array('logError', 40)
            )
        );
    }

    /**
     * @param GetResponseEvent $event
     */
    public function enableDebug(GetResponseEvent $event) {
        $route = $event->getRequest()->attributes->get('_route');
        $debug_api = $event->getRequest()->query->get('debug_api');
        if ($route === 'app_api_index'
            && $debug_api === '1') {
            ini_set('display_errors', 0);
            Config::enableValidation();

            set_error_handler(function($severity, $message, $file, $line) use (&$phpErrors) {
                $phpErrors[] = new \ErrorException($message, 0, $severity, $file, $line);
            });
        }
    }

    public function logError(GetResponseForControllerResultEvent $event) {
        $route = $event->getRequest()->attributes->get('_route');
        $debug_api = $event->getRequest()->query->get('debug_api');
        if ($route === 'app_api_index'
            && $debug_api === '1'
            && !empty($phpErrors)) {
            $result = (array) $event->getControllerResult();
            $result['extensions']['phpErrors'] = array_map(
                ['GraphQL\Error\FormattedError', 'createFromPHPError'],
                $phpErrors
            );
        }
    }
}