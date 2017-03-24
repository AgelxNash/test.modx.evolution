<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class getFieldTest
 *
 * @see DocumentParser::getField
 * @package ModxEvo\Tests\DocumentParser
 */
class getFieldTest extends ModxAbstract
{
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp()
    {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "getField");
    }

    public function testSuccess() {
        /** @TODO */
    }
}
