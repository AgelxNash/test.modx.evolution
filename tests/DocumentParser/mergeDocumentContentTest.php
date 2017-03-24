<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

/**
 * Class mergeDocumentContentTest
 *
 * @see DocumentParser::mergeDocumentContent
 * @package ModxEvo\Tests\DocumentParser
 */
class mergeDocumentContentTest extends ModxAbstract {
    /**
     * @var \ReflectionClass
     */
    protected $method;

    public function setUp() {
        parent::setUp();

        $this->method = $this->getMethod($this->modx, "mergeDocumentContent");
    }
    public function testPagetitleSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle*]');
        $this->assertEquals($this->modx->documentObject['pagetitle'], $filters);
    }
    public function testPagetitleWithQuickEditSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*#pagetitle*]');
        $this->assertEquals($this->modx->documentObject['pagetitle'], $filters);
    }
    public function testTvExistSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*tv*]');
        $this->assertEquals($this->modx->documentObject['tv'][1], $filters);
    }

    public function testTvNoExistsSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*iqw7e6576182bnzx*]');
        $this->assertEquals("", $filters);
    }
    /*public function testPagetitleAliasSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle@alias(*]');
    }
    public function testPagetitleUSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle@u(*]');
    }
    public function testPagetitleUltimateParentSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle@ultimateparent*]');
    }
    public function testPagetitleUparentSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle@uparent*]');
    }
    public function testPagetitleUpSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle@up*]');
    }
    public function testPagetitleSiteStartSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle@site_start*]');
    }
    public function testPagetitleParentSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle@parent*]');
    }
    public function testPagetitlePSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle@p*]');
    }
    public function testPagetitleByIDSuccess()
    {
        $filters = $this->method->invoke($this->modx, '[*pagetitle@1*]');
    }*/
}
