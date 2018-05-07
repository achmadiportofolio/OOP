<?php 
namespace App\DataStore;
use App\DataStore\DataStoreInterface;

/**
*  
*/
class FileDataStore implements DataStoreInterface
{

    private $prefix_file = 'Test_File';
    private $ext = '.txt';
    private $file_name;

    public function  save( Array $value)
    {
        $key =  current( array_keys( $value ) ) ;


        $new_value = array_values( $value );
                                // $this->file_name =$this->prefix_file.date('Ymdhis').$this->ext;
                                // $this->file_name =$this->prefix_file.$this->ext;
        $this->file_name = [ $key => $this->prefix_file.$this->ext ];

                                // file_put_contents( $this->file_name, json_encode($this->file));
        file_put_contents( $this->file_name[$key], json_encode( $new_value ) );
    }
    public function  get( string $key )
    {
                                // return $this->file;
                                // return file_get_contents('Test_File.txt');
                                // return file_get_contents($this->file_name);
        return file_get_contents( $this->file_name[ $key ] );
    }
}