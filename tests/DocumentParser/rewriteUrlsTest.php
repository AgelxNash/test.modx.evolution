<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class rewriteUrlsTest
 *
 * @see DocumentParser::rewriteUrls
 * @package ModxEvo\Tests\DocumentParser
 */
class rewriteUrlsTest extends ModxAbstract
{
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp()
    {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "rewriteUrls");
    }

    public function testSuccess() {
        /** @TODO */
    }
}
