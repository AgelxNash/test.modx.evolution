<?php namespace ModxEvo\Tests;

abstract class ModxAbstract extends TestAbstract
{
    /**
     * @var null|\DocumentParser
     */
    protected $modx = null;

    public function setUp()
    {
        try {
            $this->modx = $this->mockMODX();
            $this->assertTrue($this->modx instanceof \DocumentParser);
        }catch(\Exception $e){}

        $this->modx->db = $this->mockDBAPI();
        $this->assertTrue($this->modx->db instanceof \DBAPI);

        global $modx;
        $modx = $this->modx;
    }

    protected function mockDBAPI()
    {
        $DBAPI = $this->getMockBuilder('DBAPI')
            ->setMethods(array('query', 'makeArray', 'escape', 'getValue', 'select', 'getRecordCount', 'getRow', 'isResult'))
            ->getMock();

        $DBAPI->expects($this->any())
            ->method('makeArray')
            ->will($this->returnValue(array()));

        $DBAPI->expects($this->any())
            ->method('escape')
            ->will($this->returnArgument(0));

        $DBAPI->expects($this->any())
            ->method('getValue')
            ->will($this->returnValue(null));

        $DBAPI->expects($this->any())
            ->method('select')
            ->will($this->returnValue(null));

        $DBAPI->expects($this->any())
            ->method('getRecordCount')
            ->will($this->returnValue(0));

        $DBAPI->expects($this->any())
            ->method('getRow')
            ->will($this->returnValue(array()));

        $DBAPI->expects($this->any())
            ->method('isResult')
            ->will($this->returnValue(false));

        return $DBAPI;
    }

   protected function mockMODX(array $config = array())
    {
        $modx = $this->getMockBuilder(\DocumentParser::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getFullTableName'))
            ->getMock();

        $modx->expects($this->any())
            ->method('getFullTableName')
            ->will($this->returnArgument(0));

        $modx->db = $this->mockDBAPI();

        $modx->documentObject = array(
            'id'              => 1,
            'type'            => 'document',
            'contentType'     => 'text/html',
            'pagetitle'       => 'blank',
            'longtitle'       => '',
            'description'     => '',
            'alias'           => '',
            'link_attributes' => '',
            'published'       => 1,
            'pub_date'        => 0,
            'unpub_date'      => 0,
            'parent'          => 0,
            'isfolder'        => 0,
            'introtext'       => '',
            'content'         => '',
            'richtext'        => 1,
            'template'        => 0,
            'menuindex'       => 0,
            'searchable'      => 1,
            'cacheable'       => 1,
            'createdon'       => 0,
            'createdby'       => 0,
            'editedon'        => 0,
            'editedby'        => 0,
            'deleted'         => 0,
            'deletedon'       => 0,
            'deletedby'       => 0,
            'publishedon'     => 0,
            'publishedby'     => 0,
            'menutitle'       => '',
            'donthit'         => 0,
            'haskeywords'     => 0,
            'hasmetatags'     => 0,
            'privateweb'      => 0,
            'privatemgr'      => 0,
            'content_dispo'   => 0,
            'hidemenu'        => 0,
            'alias_visible'   => 1,
            'tv' => array(
                0 => 'tv', //name
                1 => 'value',
                2 => '',
                3 => '',
                4 => 'text' //input type
            )
        );
        $modx->documentIdentifier = 1;

        $modx->config = array_merge(array(
            'manager_language' => 'russian-UTF8',
            'site_start'       => 1,
            'site_url'         => 'http://example.com/',
            'test'             => 'test',
            'field_from_document_object' => 'pagetitle',
            'error_reporting'  => 0,

            'blank' => 'message',
            'inside' => 'blank',
            'insideWithProps' => 'blank-with-props? &str=`line from snippet`'
        ), $config);

        $modx->chunkCache = array(
            'blank' => 'Test content',
            'inside' => 'blank',
            'insideWithProps' => 'blank-with-props? &str=`line from snippet`',
            'inside-snippet' => 'blank'
        );

        $modx->snippetCache = array(
            'blank' => 'return "end snippet";',

            'blank-with-props' => 'return $str.(isset($end) ? " ".$end : "");',
            'blank-with-propsProps' => '&str=name parameter;text;end snippet',

            'inside' => 'return "blank";',
            'insideWithProps' => 'return "blank-with-props? &str=`line from snippet`";',

            'into-chunk' => 'return "blank";',
        );

        $modx->placeholders = array(
            'test' => 'example content placeholder',
            'blank' => 'placeholder text',
            'inside' => 'blank',
            'insideWithProps' => 'blank-with-props? &str=`line from snippet`'
        );
        return $modx;
    }
}
