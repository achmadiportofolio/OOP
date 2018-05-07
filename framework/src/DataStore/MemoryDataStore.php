<?php 
namespace App\DataStore;
use App\DataStore\DataStoreInterface;

/**
* 
*/
class MemoryDataStore implements DataStoreInterface
{
    
    private $memory;

    public function  save( Array $value )
    {
        $this->memory = $value;
    }
    public function  get( string $key )
    {
                            // return $this->memory;
        return $this->memory[ $key ];
    }
}