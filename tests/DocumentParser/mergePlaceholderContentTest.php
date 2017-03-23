<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

class mergePlaceholderContentTest extends ModxAbstract {
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp() {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "mergePlaceholderContent");
    }

    public function testPlaceholderSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[+test+]');
        $this->assertEquals('[+test+]', $filters);
    }

    public function testNameInConfigSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[+[(test)]+]');
        $this->assertEquals(sprintf('[+%s+]', $this->modx->getConfig('test')), $filters);
    }
}

