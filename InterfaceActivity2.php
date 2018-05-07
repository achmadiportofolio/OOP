<?php


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

/**
*  
*/
class FileDataStore implements DataStoreInterface
{
                // private $file ;
    private $prefix_file = 'Test_File';
    private $ext = '.txt';
    private $file_name;

    public function  save( Array $value)
    {
                                // $this->file = $value;

        $key = implode( '' , current( array_keys( $value ) ) );
        $new_value = array_values( $value );
                                // $this->file_name =$this->prefix_file.date('Ymdhis').$this->ext;
                                // $this->file_name =$this->prefix_file.$this->ext;
        $this->file_name = [ $key => $this->prefix_file.$this->ext ];

                                // file_put_contents( $this->file_name, json_encode($this->file));
        file_put_contents( $this->file_name, json_encode( $new_value ) );
    }
    public function  get( string $key )
    {
                                // return $this->file;
                                // return file_get_contents('Test_File.txt');
                                // return file_get_contents($this->file_name);
        return file_get_contents( $this->file_name[ $key ] );
    }
}


/**
* 
*/
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

/**
* 
*/
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

            // // $testArticle1 = (new Article(new MemoryDataStore()))->saveArticle(['Hello Word'])->getArticle();
            // $testArticle1 = (new Article(new MemoryDataStore()))->saveArticle('Hello Word 1 ')->getArticle();
            // echo("<pre>");
            // print_r( $testArticle1 );
            // // exit(__class__.'@'.__method__.'@'.__line__.'@'.__FILE__);

            // $testArticle2 = (new Article(new FileDataStore()))->saveArticle( ' Hello Word 2')->getArticle();
            // print_r( $testArticle2 );


$testArticle1 = (new Article(new MemoryDataStore()))->saveArticle('Hello Word 1 from Article')->getArticle();
echo("<pre>");
print_r( $testArticle1 );


$testPost = (new Post(new MemoryDataStore()))->savePost('Hello Word 2 from Post  ')->getPost();
echo PHP_EOL;
echo("<pre>");
print_r( $testPost );
