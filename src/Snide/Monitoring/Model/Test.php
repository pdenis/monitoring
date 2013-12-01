<?php

namespace Snide\Monitoring\Model;

/**
 * Class Test
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
abstract class Test
{
    /**
     * Test identifier
     *
     * @var string
     */
    protected $identifier;
    /**
     * Test category
     *
     * @var string
     */
    protected $category;
    /**
     * Possible exception
     *
     * @var \Exception
     */
    protected $exception;
    /**
     * This test is critic?
     *
     * @var boolean
     */
    protected $critic = false;
    /**
     * This test can be executed?
     *
     * @var boolean
     */
    protected $executable;

    /**
     * Constructor
     *
     * @param string $identifier Test identifier
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
        $this->executable = true;
    }

    /**
     * Getter category
     *
     * @return string
     */
    public function getCategory()
    {
        if (null == $this->category) {
            return 'unknown';
        }
        return $this->category;
    }

    /**
     * Setter category
     *
     * @param $category Test category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Getter exception
     *
     * @return \Exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * Setter exception
     *
     * @param \Exception $exception Possible exception
     */
    public function setException(\Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Getter identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Setter identifier
     *
     * @param string $identifier Test identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Define if test has failed
     *
     * @return bool
     */
    public function hasFailed()
    {
        return (null != $this->exception);
    }

    /**
     * Getter critic (This test is critic?)
     *
     * @return bool
     */
    public function isCritic()
    {
        return $this->critic;
    }

    /**
     * Setter critic
     *
     * @param boolean $critic Test critic or not
     */
    public function setCritic($critic)
    {
        $this->critic = $critic;
    }

    /**
     * Getter executable
     *
     * @return bool
     */
    public function isExecutable()
    {
        return $this->executable;
    }

    /**
     * Setter executable
     *
     * @param $executable This test can be executed?
     */
    public function setExecutable($executable)
    {
        $this->executable = $executable;
    }

    /**
     * Execute a test
     *
     * @throws \Exception
     * @return void
     */
    abstract public function execute();

}
