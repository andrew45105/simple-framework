<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Andrew45105\SFC\Container\ParamsContainer;

/**
 * Contains methods for test IndexController class
 *
 * Class IndexControllerTest
 */
class IndexControllerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var ParamsContainer
     */
    private $paramsContainer;

    public function setUp()
    {
        parent::setUp();
        $this->paramsContainer = new ParamsContainer(__DIR__.'/../../app/config');
    }

    public function tearDown()
    {
        parent::tearDown();
        unset($this->paramsContainer);
    }

    public function testIndexAction()
    {
        $siteUrl = $this->paramsContainer->getParam('site_url');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $siteUrl);

        $data = curl_exec($ch);
        curl_close($ch);

        $this->assertContains('Index Page', $data);
    }
    
}