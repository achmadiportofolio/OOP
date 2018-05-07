<?php
namespace App\Model;
use App\DataStore\DataStoreInterface;
class Post
{

    private $dataStore ;
    private $key_data='post' ;
    public function     __construct(DataStoreInterface $DataStoreInterface)
    {
        $this->dataStore = $DataStoreInterface;
    }
    public function savePost(string $dataPost)
    {
        $data = [ $this->key_data => $dataPost ];
                    // $this->dataStore->save($dataPost)  ;
        $this->dataStore->save($data)  ;
        return $this;
    }

    public function getPost()
    {
        return $this->dataStore->get($this->key_data);
    }
}