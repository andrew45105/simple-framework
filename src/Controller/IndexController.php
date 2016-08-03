<?php

namespace App\Controller;

use Lex\Parser;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class IndexController
 * routing GET "/" requests
 */
class IndexController
{

    public function indexAction(ServerRequestInterface $request, ResponseInterface $response)
    {
        $parser = new Parser();
        $template = $parser->parse(
            file_get_contents(__DIR__.'/../Resources/views/index/index.lex'),
            [
                'data' => [
                    'h1' => 'Its index page!',
                    'file' => __FILE__,
                ],
            ]
        );
        return $response->getBody()->write($template);
    }

    public function otherAction(ServerRequestInterface $request, ResponseInterface $response)
    {
        $parser = new Parser();
        $template = $parser->parse(
            file_get_contents(__DIR__.'/../Resources/views/index/other.lex'),
            [
                'data' => [
                    'h1' => 'Its other page!',
                    'file' => __FILE__,
                ],
            ]
        );
        return $response->getBody()->write($template);
    }

}