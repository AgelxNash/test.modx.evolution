<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class mergeSettingsContentTest
 *
 * @see DocumentParser::mergeSettingsContent
 * @package ModxEvo\Tests\DocumentParser
 */
class mergeSettingsContentTest extends ModxAbstract {
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp() {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "mergeSettingsContent");
    }

    public function testSiteUrlSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[(site_url)]');
        $this->assertEquals($this->modx->getConfig('site_url'), $filters);
    }

    public function testConfigFromSnippetSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[([[inside]])]');
        $this->assertEquals('', $filters);
    }

    public function testConfigFromChunkSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[({{inside}})]');
        $this->assertEquals('', $filters);
    }

    public function testConfigFromPlaceholderSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[([+inside+])]');
        $this->assertEquals('', $filters);
    }

    public function testConfigFromDocSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[([*inside*])]');
        $this->assertEquals('', $filters);
    }
    public function testConfigFromConfigSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[([(inside)])]');
        $this->assertEquals('[()]', $filters);
    }
}

