<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

class parsePropertiesTest extends ModxAbstract {
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp() {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "parseProperties");
    }

    public function testBlankSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '&str=name parameter;text;end snippet');
        $this->assertEquals(array('str' => 'end snippet'), $filters);
    }
}

