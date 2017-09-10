<?php

class Users extends MY_Model{
    const DB_TABLE = 'users';
    
    const DB_TABLE_PK = 'national_id';

    public $national_id;
    
    public $username;
    
    public $hashed_password;
}
