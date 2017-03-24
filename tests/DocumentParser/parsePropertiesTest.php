<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class parsePropertiesTest
 *
 * @see DocumentParser::parseProperties
 * @package ModxEvo\Tests\DocumentParser
 */
class parsePropertiesTest extends ModxAbstract {
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp() {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "parseProperties");
    }

    public function testTextSuccess()
    {
        $filters = $this->method->invoke($this->modx, '&str=name parameter;text;end snippet');
        $this->assertEquals(array('str' => 'end snippet'), $filters);
    }

    public function testTextEmptySuccess()
    {
        $filters = $this->method->invoke($this->modx, '&str=name parameter;text;');
        $this->assertEquals(array(), $filters);
    }

    public function testListSuccess()
    {
        $filters = $this->method->invoke($this->modx, '&table_name=Trans table;list;common,russian,dutch,german,czech,utf8,utf8lowercase;russian');
        $this->assertEquals(array('table_name' => 'russian'), $filters);
    }

    public function testListEmptySuccess()
    {
        $filters = $this->method->invoke($this->modx, '&table_name=Trans table;list;common,russian,dutch,german,czech,utf8,utf8lowercase;');
        $this->assertEquals(array(), $filters);
    }

    public function testListMultiSuccess()
    {
        $filters = $this->method->invoke($this->modx, '&table_name=Trans table;list-multi;common,russian,dutch,german,czech,utf8,utf8lowercase;common,russian');
        $this->assertEquals(array('table_name' => 'common,russian'), $filters);
    }

    /*public function testListMultiEmptySuccess()
    {
        $filters = $this->method->invoke($this->modx, '&table_name=Trans table;list-multi;common,russian,dutch,german,czech,utf8,utf8lowercase;');
        $this->assertEquals(array('table_name' => ''), $filters);
    }*/

    /*public function testCheckboxSuccess()
    {
        $filters = $this->method->invoke($this->modx, '&str=name parameter;checkbox;common,russian,dutch,german,czech,utf8,utf8lowercase;utf8,utf8lowercase');
        $this->assertEquals(array('str' => 'utf8,utf8lowercase'), $filters);
    }

    public function testCheckboxEmptySuccess()
    {
        $filters = $this->method->invoke($this->modx, '&str=name parameter;checkbox;common,russian,dutch,german,czech,utf8,utf8lowercase;');
        $this->assertEquals(array('str' => ''), $filters);
    }*/

    /*public function testRadioSuccess()
    {
        $filters = $this->method->invoke($this->modx, '&str=name parameter;radio;common,russian,dutch,german,czech,utf8,utf8lowercase;german');
        $this->assertEquals(array('str' => 'german'), $filters);
    }

    public function testRadioEmptySuccess()
    {
        $filters = $this->method->invoke($this->modx, '&str=name parameter;radio;common,russian,dutch,german,czech,utf8,utf8lowercase;');
        $this->assertEquals(array('str' => ''), $filters);
    }*/

   /* public function testJsonOneSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{"str": "end snippet"}');
        $this->assertEquals(array('str' => 'end snippet'), $filters);
    }

    public function testJsonMultiSuccess()
    {
        $filters = $this->method->invoke($this->modx, '{"str": [{"value": "end snippet"}]}');
        $this->assertEquals(array('str' => 'end snippet'), $filters);
    }*/
}

