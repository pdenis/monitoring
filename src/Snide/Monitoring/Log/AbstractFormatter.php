<?php

namespace Snide\Monitoring\Log;

use Snide\Log\AbstractFormatter as BaseAbstractFormatter;

/**
 * Class AbstractFormatter
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
abstract class AbstractFormatter extends BaseAbstractFormatter
{
    /**
     * Format a log
     *
     * @param string $log A log to format
     */
    public function format($log)
    {
        switch ($this->params['EVENT']) {
            case Events::PRE_EXECUTE :
                $this->formatPreExecute($log);
                break;
            case Events::POST_EXECUTE :
                $this->formatPostExecute($log);
                break;
            case Events::TEST_EXECUTED :
                $this->formatTestExecuted($log);
                break;
        }
    }

    /**
     * Format pre execute log
     *
     * @param string $log A log to format
     */
    protected abstract function formatPreExecute($log);

    /**
     * Format post execute log
     *
     * @param string $log A log to format
     */
    protected abstract function formatPostExecute($log);

    /**
     * Format test executed log
     *
     * @param string $log A log to format
     */
    protected abstract function formatTestExecuted($log);
}