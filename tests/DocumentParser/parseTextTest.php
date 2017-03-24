<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class parseTextTest
 *
 * @see DocumentParser::parseText
 * @package ModxEvo\Tests\DocumentParser
 */
class parseTextTest extends ModxAbstract
{
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp()
    {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "parseText");
    }

    public function testNoArrayParamsSuccess() {
        $text = $this->method->invoke($this->modx, '[+text+]', 'is array ????');
        $this->assertEquals('[+text+]', $text);
    }

    public function testArrayParamsSuccess() {
        $text = $this->method->invoke($this->modx, '[+text+]', array('text' => 'content'));
        $this->assertEquals('content', $text);
    }

    public function testArrayParamsWhioutPlaceholerSuccess() {
        $text = $this->method->invoke($this->modx, '[+text+]', array('text2' => 'content'));
        $this->assertEquals('[+text+]', $text);
    }

    public function testArrayRecursiveParamsPlaceholerSuccess() {
        $text = $this->method->invoke($this->modx, '[+text2+]', array('text2' => '[+test+]', 'test' => 'content'));
        $this->assertEquals('content', $text);
    }

    public function testArrayNoRecursiveParamsPlaceholerSuccess() {
        $text = $this->method->invoke($this->modx, '[+text2+]', array('test' => 'content', 'text2' => '[+test+]'));
        $this->assertEquals('[+test+]', $text);
    }

    public function testArrayDoubleParamsPlaceholerSuccess() {
        $text = $this->method->invoke($this->modx, '[+test+] [+test+]', array('test' => 'content'));
        $this->assertEquals('content content', $text);
    }
}
