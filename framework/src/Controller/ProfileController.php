<?php 
namespace App\Controller;
use App\Model\User;
use App\Model\Post;

/**
*       
*/
class ProfileController
{
    private $user;
    private $post;
    public function __construct( User $user , Post $Post  )
    {
        $this->user = $user;
        $this->post = $Post;
        // echo("<pre>");
        // print_r( $user );
    }
    
    function __invoke()
    {
            echo "<pre>";
        echo "Profle Page From Controller Namespace App\Controller";
    }
}