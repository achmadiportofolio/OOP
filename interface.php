<?php

interface DataStore{

    /*constan bisa, untuk property tidak bisa */
    const A = '121';
    /* harus public , karena dibutuhkan untuk di implementasi */
    public function save($value);
    
}