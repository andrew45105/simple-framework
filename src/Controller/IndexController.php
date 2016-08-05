<?php

namespace Andrew45105\SF\Controller;

use Andrew45105\SFC\Controller\WebController;
use Lex\Parser;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class IndexController
 *
 * Routing GET "/" requests
 *
 * @package Andrew45105\SF\Controller
 */
class IndexController extends WebController
{

    public function indexAction(ServerRequestInterface $request, ResponseInterface $response)
    {
        $template = $this->getTemplate(
            __DIR__,
            [
                'data' => [
                    'h1' => 'Its index page!',
                    'file' => __FILE__,
                ],
            ]
        );
        $response->getBody()->write($template);
        
    }

    public function otherAction(ServerRequestInterface $request, ResponseInterface $response)
    {
        $template = $this->getTemplate(
            __DIR__,
            [
                'data' => [
                    'h1' => 'Its other page!',
                    'file' => __FILE__,
                ],
            ]
        );
        $response->getBody()->write($template);
    }

}