<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class parseDocumentSourceTest
 *
 * @see DocumentParser::parseDocumentSource
 * @package ModxEvo\Tests\DocumentParser
 */
class parseDocumentSourceTest extends ModxAbstract
{
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp()
    {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "parseDocumentSource");
    }

    public function testSuccess() {
        /** @TODO */
    }
}
