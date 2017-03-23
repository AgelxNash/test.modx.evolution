<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

class mergeChunkContentTest extends ModxAbstract {
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp() {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "mergeChunkContent");
    }

    public function testPlaceholderSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{{blank}}');
        $this->assertEquals($this->modx->chunkCache['blank'], $filters);
    }
}

