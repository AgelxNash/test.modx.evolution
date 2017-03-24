<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class cleanDocumentIdentifier
 *
 * @see DocumentParser::cleanDocumentIdentifier
 * @package ModxEvo\Tests\DocumentParser
 */
class cleanDocumentIdentifierTest extends ModxAbstract
{
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp()
    {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "cleanDocumentIdentifier");
    }

    public function testSuccess() {
        /** @TODO */
    }
}
