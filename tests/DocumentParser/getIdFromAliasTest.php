<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class getIdFromAlias
 *
 * @see DocumentParser::getIdFromAlias
 * @package ModxEvo\Tests\DocumentParser
 */
class getIdFromAliasTest extends ModxAbstract
{
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp()
    {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "getIdFromAlias");
    }

    public function testSuccess() {
        /** @TODO */
    }
}
