<?php

namespace Snide\Monitoring\Test;

/**
 * Class GenericTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class GenericTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Generic
     */
    protected $object;

    protected $data;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->data = array(
            'category' => 'My category',
            'critic' => true,
            'exception' => array(
                'message' => 'A message',
                'code'   => 1
            ),
            'identifier' => 'Generic test'
        );
        $this->object = new Generic($this->data);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Snide\Monitoring\Test\Generic::__construct
     */
    public function testConstruct()
    {
        $this->assertEquals($this->data['identifier'], $this->object->getIdentifier());
        $this->assertEquals($this->data['critic'], $this->object->isCritic());
        $this->assertEquals($this->data['category'], $this->object->getCategory());
        $this->assertEquals(new \Exception($this->data['exception']['message'],$this->data['exception']['code']), $this->object->getException());
    }

    /**
     * @covers Snide\Monitoring\Test\Generic::execute
     */
    public function testExecute()
    {
        $this->assertFalse($this->object->isExecutable());
        try {
            $this->object->execute();
            $this->fail('No exception thrown');
        } catch(\Exception $e) {

        }
    }
}