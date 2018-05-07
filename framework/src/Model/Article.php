<?php
namespace App\Model;
use App\DataStore\DataStoreInterface;

class Article
{

    private $dataStore ;
    private $key_data='article' ;
    public function     __construct(DataStoreInterface $DataStoreInterface)
    {
        $this->dataStore = $DataStoreInterface;
    }
    public function saveArticle(string $dataArticle)
    {
        $data = [ $this->key_data => $dataArticle ];
                    // $this->dataStore->save( $dataArticle )  ;
        $this->dataStore->save( $data )  ;
        return $this;
    }

    public function getArticle()
    {
        return $this->dataStore->get($this->key_data);
    }
}