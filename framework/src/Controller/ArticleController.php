<?php 
namespace App\Controller;
use App\Model\User;
use App\Model\Post;
use App\Model\Article;

/**
*       
*/
class ArticleController
{
    // private $user;
    private $data_store;
    private $article;
    // private $post;
    // public function __construct(DataStoreInterface $data_store   )
    // {
    //     // $this->user = $user;
    //     // $this->post = $Post;
    //     $this->data_store = $data_store;
    //     // echo("<pre>");
    //     // print_r( $user );
    // }

    public function __construct(Article $article   )
    {
        // $this->user = $user;
        // $this->post = $Post;
        // $this->data_store = $data_store;
        $this->article = $article;
        // echo("<pre>");
        // print_r( $user );
    }
    
    function __invoke()
    {
        // $this->data_store->saveArticle('Hello Word 1 from Article')->getArticle();
        $data = $this->article->saveArticle('Hello Word 1 from Article')->getArticle();
        // echo("<pre>");
        print_r( $data );
        echo PHP_EOL.'<br>';
        // exit(__class__.'@'.__method__.'@'.__line__.'@'.__FILE__);
            // echo "<pre>";
        echo "Profle Page From Controller Namespace App\Controller";
    }
}