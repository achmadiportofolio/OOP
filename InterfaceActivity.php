<?php


interface DataStoreInterface{

    public function save(Array $article);
    public function get();

}

/**
* 
*/
class MemoryDataStore implements DataStoreInterface
{
    private $memory = [];
    public function  save(Array $value)
    {
        $this->memory['memory'] = $value;
    }
    public function  get()
    {
        return $this->memory;
    }
}

/**
*  
*/
class FileDataStore implements DataStoreInterface
{
    private $file = [];
    private $prefix_file = 'Test_File';
    private $ext = '.txt';
    private $file_name;
    public function  save(Array $value)
    {
        $this->file['file'] = $value;
        // $this->file_name =$this->prefix_file.date('Ymdhis').$this->ext;
        $this->file_name =$this->prefix_file.$this->ext;
        file_put_contents( $this->file_name, json_encode($this->file));
    }
    public function  get()
    {
        // return $this->file;
        // return file_get_contents('Test_File.txt');
        return file_get_contents($this->file_name);
    }
}


/**
* 
*/
class Article
{

    private $dataStore ;
    public function     __construct(DataStoreInterface $DataStoreInterface)
    {
        $this->dataStore = $DataStoreInterface;
    }
    public function saveArticle($dataArticle)
    {
        $this->dataStore->save($dataArticle)  ;
        return $this;
    }

    public function getArticle()
    {
        return $this->dataStore->get();
    }
}

$testArticle1 = (new Article(new MemoryDataStore()))->saveArticle(['Hello Word'])->getArticle();
echo("<pre>");
print_r( $testArticle1 );
// exit(__class__.'@'.__method__.'@'.__line__.'@'.__FILE__);

$testArticle2 = (new Article(new FileDataStore()))->saveArticle(['Hello Word'])->getArticle();
print_r( $testArticle2 );
