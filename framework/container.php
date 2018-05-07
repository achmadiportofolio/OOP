<?php 
use Pimple\Container as C;
use App\Controller\ProfileController;
use App\Controller\ArticleController;
use App\Model\User;
use App\Model\Post;
use App\Model\Article;
use App\DataStore\DataStoreInterface;
use App\DataStore\FileDataStore;
use App\DataStore\MemoryDataStore;

$containter = new C();

/*======================== SERVICE DATASTORE ======================================*/


$containter[FileDataStore::class] = function (C $c)
{
    return new FileDataStore();
};

$containter[MemoryDataStore::class] = function (C $c)
{
    return new MemoryDataStore();
};


/*======================== SERVICE CONTROLLER ======================================*/

$containter[ProfileController::class] = function (C $c)
{
    // return new ProfileController();
    return new ProfileController($c[User::class], $c[Post::class]);
};

$containter[ArticleController::class] = function (C $c)
{
    // return new ArticleController();
    // return new ArticleController($c[MemoryDataStore::class], $c[Post::class]);
    // return new ArticleController($c[MemoryDataStore::class]);
    return new ArticleController($c[Article::class]);
};


/*======================== Service Model ======================================*/
$containter[User::class] = function (C $c)
{
    return new User();
};

$containter[Post::class] = function (C $c)
{
    return new Post($c[MemoryDataStore::class]);
};

$containter[Article::class] = function (C $c)
{
    // return new Article($c[FileDataStore::class] );
    return new Article($c[MemoryDataStore::class] );
    // return new Article($c[MemoryDataStore::class] );
};

return $containter;