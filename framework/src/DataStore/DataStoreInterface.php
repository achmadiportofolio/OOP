<?php 
namespace App\DataStore;

interface DataStoreInterface{

    /**
     * [save description]
     * @param  Array  $article [description]
     * @return [type]          []
     */
    public function save(Array $article);
    /**
     * [get description]
     * @param  string $key [description]
     * @return [string]      [array]
     */
    public function get(string $key ); 

}