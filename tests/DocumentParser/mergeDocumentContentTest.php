<?php namespace ModxEvo\Tests\DocumentParser;

use ModxEvo\Tests\ModxAbstract;

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
}
