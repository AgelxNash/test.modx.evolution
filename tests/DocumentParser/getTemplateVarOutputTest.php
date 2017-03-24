<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class getTemplateVarOutputTest
 *
 * @see DocumentParser::getTemplateVarOutput
 * @package ModxEvo\Tests\DocumentParser
 */
class getTemplateVarOutputTest extends ModxAbstract
{
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp()
    {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "getTemplateVarOutput");
    }

    public function testSuccess() {
        /** @TODO */
    }
}
