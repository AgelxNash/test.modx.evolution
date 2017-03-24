<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class getUltimateParentIdTest
 *
 * @see DocumentParser::getUltimateParentId
 * @package ModxEvo\Tests\DocumentParser
 */
class getUltimateParentIdTest extends ModxAbstract
{
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp()
    {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "getUltimateParentId");
    }

    public function testSuccess() {
        /** @TODO */
    }
}
