<?php

require_once __DIR__.'/../../vendor/autoload.php';

/**
 * Contains methods for test IndexController class
 *
 * Class IndexControllerTest
 */
class IndexControllerTest extends PHPUnit_Framework_TestCase
{

    public function testIndexAction()
    {

        $paramsContainer = new \Andrew45105\SFC\Container\ParamsContainer(__DIR__.'/../../app/config');
        $siteUrl = $paramsContainer->getParam('site_url');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $siteUrl);

        $data = curl_exec($ch);
        curl_close($ch);

        $this->assertContains('Its index page', $data);
    }
    
}