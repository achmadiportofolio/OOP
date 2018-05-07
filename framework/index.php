<?php 

require "vendor/autoload.php";
$container = require "container.php";

use App\Controller\ProfileController;
use App\Controller\ArticleController ;

// $profileC = new Profile();
// echo("<pre>");
// print_r( $profileC() );

/**
* 
*/
// class ProfileController
// {
    
//     function __invoke()
//     {
//         echo 'Profile Page from Controller';
//     }
// }

            /* magic invoke diatas bisa dipanggil dengan cara berikut */
                // $profile = new ProfileController();
                // $profile();

$dispatcher = FastRoute\SimpleDispatcher(function (FastRoute\RouteCollector $r) use ($container)
{

    $r->addRoute('GET', '/profile', function () 
    {
       echo "Page Profile";
    });
    $r->addRoute('GET', '/', function ()
    {
       echo "Route root";
    });

    $r->addRoute(
        'GET', 
        '/controller',
        // new ProfileController()
        // new Profile()
        // App\Controller\ProfileController
            // $container[App\Controller\ProfileController::class]
            $container[ProfileController::class]
         );

    $r->addRoute(
        'GET', 
        '/save-article',
        // new ProfileController()
        // new Profile()
        // App\Controller\ProfileController
            // $container[App\Controller\ProfileController::class]
            $container[ArticleController::class]
         );
                // $r->addRoute('GET', '/users', 'get_all_users_handler');
                // // {id} must be a number (\d+)
                // $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
                // // The /{title} suffix is optional
                // $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');


});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
// echo("<pre>"); : 
// print_r( $uri ); echo PHP_EOL;
// exit(__class__.'@'.__method__.'@'.__line__.'@'.__FILE__);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {

    case FastRoute\Dispatcher::NOT_FOUND:
        // exit(__class__.'@'.__method__.'@'.__line__);
        // ... 404 Not Found
        echo "Route Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1]; // route ditemukan tapi type method tidak sesuai,  mis: post tapi dipanggil dengan get 
        // exit(__class__.'@'.__method__.'@'.__line__);
        // ... 405 Method Not Allowed
        
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // exit(__class__.'@'.__method__.'@'.__line__);
        $handler();                                         // handler harus dijalanakan 
        // ... call $handler with $vars
        break;


}