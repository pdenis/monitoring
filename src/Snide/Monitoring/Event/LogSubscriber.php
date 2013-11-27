<?php

namespace Snide\Monitoring\Event;


use Snide\Monitoring\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class LogSubscriber
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class LogSubscriber extends ServiceSubscriber
{

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    public static function getSubscribedEvents()
    {
        return array(
            Events::PRE_EXECUTE   => array('onPreExecute', 0),
            Events::POST_EXECUTE  => array('onPostExecute', 0),
            Events::TEST_EXECUTED => array('onTestExecuted', 0),
        );
    }

    /**
     * Is called before test suite execution
     *
     * @param FilterMonitoringEvent $event An event
     */
    public function onPreExecute(FilterMonitoringEvent $event)
    {
        foreach ($this->getLoggers($event) as $logger) {
            $logger->getFormatter()->addParam('EVENT', Events::PRE_EXECUTE);
            $logger->info($event->getService()->getResponse()->toLog());
        }
    }

    /**
     * Is callend on post test suite execution
     *
     * @param FilterMonitoringEvent $event An event
     */
    public function onPostExecute(FilterMonitoringEvent $event)
    {
        foreach ($this->getLoggers($event) as $logger) {
            $logger->getFormatter()->addParam('EVENT', Events::POST_EXECUTE);
            $logger->error($event->getService()->getResponse()->toLog());
        }
    }

    /**
     * Is called on test executed
     *
     * @param FilterMonitoringEvent $event An event
     */
    public function onTestExecuted(FilterMonitoringEvent $event)
    {
        foreach ($this->getLoggers($event) as $logger) {
            $logger->getFormatter()->addParam('EVENT', Events::TEST_EXECUTED);
            $logger->info($event->getService()->getResponse()->toLog());
        }
    }
}