<?php
namespace rOpenDev\PHPToJS;

class PHPToJSTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param mixed  $options
     * @param string $optionsRendererdExpected
     */
    private function render($options, $optionsRendererdExpected)
    {
        $optionsRendered = PHPToJS::render($options);
        $this->assertTrue($optionsRendererdExpected == $optionsRendered);
    }

    public function testRender()
    {
        $this->render(
            (object) [
                'title' => (object) [
                    'label' => 'PHP To JS charts',
                    'class' => 'titlechart',
                    'formatter' => 'function(s) { return s.replace("-", "/"); }',
                ],
                'data' => array(2014,2013,2012,2011)
            ],
            '{title:{label:"PHP To JS charts",class:"titlechart",formatter:function(s) { return s.replace("-", "/"); }},data:[2014,2013,2012,2011]}'
        );
    }

    /**
     * Issue: an (empty?) array is converted in a object
     */
    public function testArrayRendering()
    {
        $this->render([], '[]');
    }
}
