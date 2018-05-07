<?php
require('User.php');

class Teacher  extends User {


    // protected $first_name = null ;
    // protected $last_name = null ;
    protected $middle_name = null ;

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
     public function setMiddleName($value)
    {
        $this->middle_name = $value;
    }

    // public function getFirstName($value)
    // {
    //     return $this->first_name;
    // }

    // public function getLastName($value)
    // {
    //     return $this->last_name;
    // }


    public function setName( $firstname,$lastname,$middlename =null )
    {
        $this->setFirstName($firstname);
        $this->setMiddleName($middlename);
        $this->setLastName($lastname);
    }

     public function getName()
    {
        return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }

}

$teacher = new Teacher();
$teacher->setName('Pras','Wicak','sono');
echo $teacher->getName();