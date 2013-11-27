<?php

namespace Snide;

use Snide\Monitoring\AbstractTest;
use Snide\Monitoring\Event\FilterMonitoringEvent;
use Snide\Monitoring\Events;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class Monitoring
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class Monitoring
{
    /**
     * List of tests
     *
     * @var array
     */
    protected $tests;
    /**
     * List of loggers
     *
     * @var array
     */
    protected $loggers;
    /**
     * Event dispatcher
     *
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * Current processed test
     *
     * @var AbstractTest
     */
    protected $currentTest;

    /**
     * Constructor
     */
    public function __construct()
    {}

    /**
     * Add a test to the list
     *
     * @param AbstractTest $test A test
     */
    public function addTest(AbstractTest $test)
    {
        $this->tests[] = $test;
    }

    /**
     * Getter tests
     *
     * @return array
     */
    public function getTests()
    {
        if(!is_array($this->tests)) {
            $this->tests = array();
        }
        return $this->tests;
    }

    /**
     * Setter tests
     *
     * @param array $tests List of tests
     */
    public function setTests(array $tests)
    {
        $this->tests = $tests;
    }

    /**
     * Execute test suite
     */
    public function execute()
    {
        // Send event pre execute before starting test suite
        $this->sendEvent(Events::PRE_EXECUTE);
        foreach($this->getTests() as $test)
        {
             try {
                // Execute test
                $test->execute();
            }catch (\Exception $e) {
                // Set exception
                $test->setException($e);
            }
            // Set current test
            $this->currentTest = $test;
            // Send event test executed
            $this->sendEvent(Events::TEST_EXECUTED);
        }
        // Send event post execute
        $this->sendEvent(Events::POST_EXECUTE);
    }

    /**
     * Dispatch an event
     *
     * @param $eventName Event name
     */
    public function sendEvent($eventName)
    {
        if($this->eventDispatcher) {
            $this->eventDispatcher->dispatch($eventName, new FilterMonitoringEvent($this));
        }
    }

    /**
     * Getter eventDispatcher
     *
     * @return EventDispatcher
     */
    public function getEventDispatcher()
    {
        return $this->eventDispatcher;
    }

    /**
     * Setter eventDispatcher
     *
     * @param EventDispatcher $eventDispatcher An event dispatcher
     */
    public function setEventDispatcher(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Getter loggers
     *
     * @return array
     */
    public function getLoggers()
    {
        if(!is_array($this->loggers)) {
            $this->loggers = array();
        }

        return $this->loggers;
    }

    /**
     * Setter loggers
     *
     * @param array $loggers List of loggers
     */
    public function setLoggers(array $loggers = array())
    {
        $this->loggers = $loggers;
    }
}