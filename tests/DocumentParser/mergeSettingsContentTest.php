<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

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
}

