<?php

namespace Andrew45105\SF\Controller;

use Andrew45105\SFC\Controller\WebController;
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
        $data = ['title' => 'Index Page'];
        $template = $this->getTemplate(__DIR__, $data);
        $response->getBody()->write($template);
    }

}