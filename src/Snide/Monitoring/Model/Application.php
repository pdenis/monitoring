<?php


namespace Snide\Monitoring\Model;

/**
 * Class Application
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Application
{
    /**
     * App ID
     *
     * @var string
     */
    protected $id;
    /**
     * App name
     *
     * @var string
     */
    protected $name;
    /**
     * App url
     *
     * @var string
     */
    protected $url;
    /**
     * List of tests
     *
     * @var array
     */
    protected $tests;

    /**
     * Down exception
     *
     * @var \Exception
     */
    protected $exception;

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
     * @param \Exception $exception Down exception
     */
    public function setException(\Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Getter ID
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Setter ID
     *
     * @param $id App ID
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Getter name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter name
     *
     * @param $name App name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Getter url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Setter url
     *
     * @param $url App url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Add a test to the list
     *
     * @param Test $test A test
     */
    public function addTest(Test $test)
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
        if (!is_array($this->tests)) {
            $this->tests = array();
        }
        return $this->tests;
    }

    /**
     * Setter tests
     *
     * @param array $tests List of tests
     */
    public function setTests(array $tests = array())
    {
        $this->tests = array();
        foreach ($tests as $test) {
            $this->addTest($test);
        }
    }

    /**
     * Application is working if all tests are OK & no down exception is set
     *
     * @return boolean
     */
    public function isWorking()
    {
        if (null != $this->exception) {
            return false;
        }
        foreach ($this->getTests() as $test) {
            if ($test->hasFailed()) {
                $this->exception = new \Exception('Tests failed');
                return false;
            }
        }

        return true;
    }
}