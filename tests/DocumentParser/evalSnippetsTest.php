<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class evalSnippetsTest
 *
 * @see DocumentParser::evalSnippets
 * @package ModxEvo\Tests\DocumentParser
 */
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
        $filters = $this->method->invoke($this->modx, '[[blank-with-props? &str=`test string`]]');
        $this->assertEquals('test string', $filters);
    }

    public function testBlankWithChangeMultiPropsSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[blank-with-props? &str=`test string` &end=`end line`]]');
        $this->assertEquals('test string end line', $filters);
    }

    public function testBlankWithConfigInParameterSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[blank-with-props? &str=`[(site_url)]`]]');
        $this->assertEquals($this->modx->getConfig('site_url'), $filters);
    }

    public function testParamsNoQuotesSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[blank-with-props? &str=test string]]');
        $this->assertEquals('test string', $filters);
    }

    public function testParamsNoQuotesMultiSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[blank-with-props? &str=test string &end=end line]]');
        $this->assertEquals('test string end line', $filters);
    }

    public function testQuoteInQuotesSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[blank-with-props? &str=`test `string``]]');
        $this->assertNotEquals('test `string`', $filters);
        $this->assertEquals('test ', $filters);
    }

    public function testMultiSeparatorParameterSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[blank-with-props? &str=`&test string`]]');
        $this->assertEquals('&test string', $filters);
    }

    public function testSnippetInChunkSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[{{inside}}]]');
        $this->assertEquals('', $filters);
        $this->assertNotEquals('Test content', $filters);
    }

    public function testSnippetInChunkWithParamsSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[{{insideWithProps}}]]');
        $this->assertEquals('', $filters);
        $this->assertNotEquals('line from snippet', $filters);
    }

    public function testSnippetInSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[[inside]]]]');
        $this->assertEquals('[[blank]]', $filters);
    }

    public function testSnippetInSnippetWithParamsSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[[insideWithProps]]]]');
        $this->assertEquals('[[blank-with-props? &str=`line from snippet`]]', $filters);
    }

    public function testSnippetInConfigSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[(inside)]]]');
        $this->assertEquals(']', $filters);
    }

    public function testSnippetInConfigWithParamsSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[(insideWithProps)]]]');
        $this->assertEquals(']', $filters);
    }

    public function testSnippetInConfigSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[(inside)] ]]');
        $this->assertEquals('', $filters);
    }

    public function testSnippetInConfigWithParamsSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[(insideWithProps)] ]]');
        $this->assertEquals('', $filters);
    }

    public function testSnippetInPlaceholderSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[+inside+]]]');
        $this->assertNotEquals('Test content', $filters);
        $this->assertEquals(']', $filters);
    }

    public function testSnippetInPlaceholderWithParamsSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[+insideWithProps+]]]');
        $this->assertNotEquals('line from snippet', $filters);
        $this->assertEquals(']', $filters);
    }

    public function testSnippetInPlaceholderSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[+inside+] ]]');
        $this->assertNotEquals('Test content', $filters);
        $this->assertEquals('', $filters);
    }

    public function testSnippetInPlaceholderWithParamsSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[+insideWithProps+] ]]');
        $this->assertNotEquals('line from snippet', $filters);
        $this->assertEquals('', $filters);
    }

    public function testSnippetInDocSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[*pagetitle*]]]');
        $this->assertNotEquals('blank', $filters);
        $this->assertEquals(']', $filters);
    }

    public function testSnippetInDocSpaceSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[[[*pagetitle*] ]]');
        $this->assertNotEquals('blank', $filters);
        $this->assertEquals('', $filters);
    }
}

