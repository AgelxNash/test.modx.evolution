<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class getDocumentObjectTest
 *
 * @see DocumentParser::getDocumentObject
 * @package ModxEvo\Tests\DocumentParser
 */
class getDocumentObjectTest extends ModxAbstract
{
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp()
    {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "getDocumentObject");
    }

    public function testSuccess() {
        /** @TODO */
    }
}
