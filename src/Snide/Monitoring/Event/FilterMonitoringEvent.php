<?php

namespace Snide\Monitoring\Event;

use Snide\Monitoring;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class FilterMonitoringEvent
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class FilterMonitoringEvent  extends Event
{
    protected $monitoring;

    /**
     * Constructor
     *
     * @param Monitoring $monitoring A monitoring instance
     */
    public function __construct(Monitoring $monitoring)
    {
        $this->monitoring = $monitoring;
    }

    /**
     * Getter monitoring
     *
     * @return Monitoring
     */
    public function getMonitoring()
    {
        return $this->monitoring;
    }

    /**
     * Setter monitoring
     *
     * @param Monitoring $monitoring A monitoring instance
     */
    public function setMonitoring(Monitoring $monitoring)
    {
        $this->monitoring = $monitoring;
    }
}