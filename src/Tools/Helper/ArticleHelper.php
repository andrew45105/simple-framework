<?php

namespace Andrew45105\SF\Tools\Helper;

use Andrew45105\SFC\Container\ParamsContainer;
use Andrew45105\SFC\Database\DBManager;
use Andrew45105\SFC\Entity\Article;

/**
 * Contains additional methods for work with articles
 *
 * Class ArticleHelper
 *
 * @package Andrew45105\SF\Tools\Helper
 */
class ArticleHelper
{
    
    /**
     * @var ParamsContainer
     */
    private $paramsContainer;

    /**
     * @var DBManager
     */
    private $dbManager;
    
    const ENTITY_NAME = 'Article';
    
    public function __construct()
    {
        $this->paramsContainer = new ParamsContainer(__DIR__. '/../../../app/config');
        $this->dbManager = new DBManager($this->paramsContainer);
    }

    /**
     * Return array with article data
     * 
     * @param int $id
     * 
     * @return array | null
     */
    public function getById($id)
    {
        $article = $this->dbManager->getById(self::ENTITY_NAME, $id);
        if ($article) {
            return [
                'created_at' => date('d.m.Y H:i:s', $article['created_at']),
                'title' => $article['title'],
                'text' => $article['text'],
            ];
        } else {
            return $article;
        }
    }

    /**
     * Return array with all articles data
     * 
     * @return array
     */
    public function getAll()
    {
        $articles = $this->dbManager->getAll(self::ENTITY_NAME);
        $articlesChanged = [];
        foreach ($articles as $article) {
            $article = [
                'id' => $article['id'],
                'created_at' => date('d.m.Y H:i:s', $article['created_at']),
                'title' => $article['title'],
                'text' => $article['text'],
            ];
            $articlesChanged[] = $article;
        }
        return $articlesChanged;
    }

}