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
        $this->assertEquals($this->modx->placeholders['test'], $filters);
    }

    public function testNoExistsPlaceholderSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[+q0919238iumlsnh7123+]');
        $this->assertEquals('[+q0919238iumlsnh7123+]', $filters);
    }

    public function testNameInConfigSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[+[(test)]+]');
        $this->assertEquals($this->modx->placeholders[$this->modx->getConfig('test')], $filters);
    }

    public function testNameInPlaceholderSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[+[+inside+]+]');
        $this->assertEquals('[+blank+]', $filters);
    }

    public function testNameInSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[+[[inside]]+]');
        $this->assertEquals('[+[[inside]]+]', $filters);
    }

    public function testNameInChunkSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[+{{inside}}+]');
        $this->assertEquals('[+{{inside}}+]', $filters);
    }

    public function testNameInDocSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[+[*inside*]+]');
        $this->assertEquals('[+[*inside*]+]', $filters);
    }
}

