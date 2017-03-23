<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

class evalSnippetsTest extends ModxAbstract {
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp() {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "evalSnippets");
    }

    public function testBlankSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[blank]]');
        $this->assertEquals('end snippet', $filters);
    }

    public function testBlankWithDefaultPropsSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[blank-with-props]]');
        $this->assertEquals('end snippet', $filters);
    }

    public function testBlankWithChangePropsSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[blank-with-props? &str=`test sting`]]');
        $this->assertEquals('test sting', $filters);
    }
}

