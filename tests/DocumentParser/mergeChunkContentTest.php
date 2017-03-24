<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class mergeChunkContentTest
 *
 * @see DocumentParser::mergeChunkContent
 * @package ModxEvo\Tests\DocumentParser
 */
class mergeChunkContentTest extends ModxAbstract {
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp() {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "mergeChunkContent");
    }

    public function testBaseSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{blank}}');
        $this->assertEquals($this->modx->chunkCache['blank'], $filters);
    }

    public function testChunkFromSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{[[into-chunk]]}}');
        $this->assertEquals('', $filters);
    }
    public function testChunkFromSnippetWithSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{[[into-chunk]] }}');
        $this->assertEquals('', $filters);
    }

    public function testChunkFromConfigSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{[(inside)]}}');
        $this->assertEquals('', $filters);
    }
    public function testChunkFromConfigWithSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{[(inside)] }}');
        $this->assertEquals('', $filters);
    }

    public function testChunkFromPlaceholderSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{[+inside+]}}');
        $this->assertEquals('', $filters);
    }
    public function testChunkFromPlaceholderWithSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{[+inside+] }}');
        $this->assertEquals('', $filters);
    }
    public function testChunkFromChunkSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{{{inside}}}}');
        $this->assertEquals('{{}}', $filters);
    }
    public function testChunkFromChunkWithSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{{{inside}} }}');
        $this->assertEquals('{{ }}', $filters);
    }

    public function testChunkFromDocSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{[*pagetitle*]}}');
        $this->assertEquals('', $filters);
    }
    public function testChunkFromDocWithSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{[*pagetitle*] }}');
        $this->assertEquals('', $filters);
    }


}

