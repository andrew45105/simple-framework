<?php

namespace Andrew45105\SF\Controller;

use Andrew45105\SF\Tools\Helper\ArticleHelper;
use Andrew45105\SFC\Controller\WebController;
use Andrew45105\SFC\Database\DBManager;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ArticleController
 *
 * Routing GET "/article" requests
 *
 * @package Andrew45105\SF\Controller
 */
class ArticleController extends WebController
{

    private $articleHelper;

    public function __construct()
    {
        parent::__construct();
        $this->articleHelper = new ArticleHelper();
    }

    /**
     * Routing GET "/" requests
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     */
    public function indexAction(ServerRequestInterface $request, ResponseInterface $response)
    {
        $articles = $this->articleHelper->getAll();
        $data = ['articles' => $articles];
        $template = $this->getTemplate(__DIR__, $data);
        $response->getBody()->write($template);
    }

    /**
     * Routing GET "/get/{id}" requests
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     */
    public function articleAction(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'];
        
        if (!is_int($id) || $id < 1) {

            $article = $this->articleHelper->getById($id);
            
            if ($article) {
                $data = ['article' => $article];
            } else {
                $data = ['error' => "Article with id = {$id} does not exist"];
            }
            
        } else {
            $data = ['error' => "Argument 'id' is incorrect"];
        }
        $template = $this->getTemplate(__DIR__, $data);
        $response->getBody()->write($template);
    }
    
}