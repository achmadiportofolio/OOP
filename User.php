<?php


class User {


    protected $first_name = null ;
    protected $last_name = null ;

    // public function __construct( $firstname='Default First Name', $lastname='Default Last Name' )
    // {
    //     $this->setFirstName($firstname);
    //     $this->setLastName($lastname);
    // }
    public function setFirstName($value)
    {
        $this->first_name = $value;
    }

    public function setLastName($value)
    {
        $this->last_name = $value;
    }

    public function getFirstName($value)
    {
        return $this->first_name;
    }

    public function getLastName($value)
    {
        return $this->last_name;
    }


    public function setName( $firstname, $lastname )
    {
        $this->setFirstName($firstname);
        $this->setLastName($lastname);
    }

     public function getName()
    {
        return $this->first_name.' '.$this->last_name;
    }

}

$user = new User();
$user->setName('Pras','Wicaksono');
echo $user->getName();