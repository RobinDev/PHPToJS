<?php
namespace rOpenDev\PHPToJS;

class PHPToJSTest extends \PHPUnit_Framework_TestCase
{
    public function testRender()
    {
        $options = (object) [
            'title' => (object) [
                'label' => 'PHP To JS charts',
                'class' => 'titlechart',
                'formatter' => 'function(s) { return s.replace("-", "/"); }',
            ],
            'data' => array(2014,2013,2012,2011)
        ];

        $optionsRendered = PHPToJS::render($options);

        $optionsRendererdExpected = '{title:{label:"PHP To JS charts",class:"titlechart",formatter:function(s) { return s.replace("-", "/"); }},data:[2014,2013,2012,2011]}';

        $this->assertTrue($optionsRendererdExpected == $optionsRendered);
    }
}
