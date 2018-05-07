<?php
/**
*  readibilyty                                             
*/
class ClassName 
{
    
    function __construct()
    {
        # code...
    }

    public static function newClass($x = [])
    {
        $class = new StdClass();
        return $class;
    }
}

echo("<pre>");
print_r( ClassName::newClass() );
print_r( new ClassName );
exit(__class__.'@'.__method__.'@'.__line__.'@'.__FILE__);