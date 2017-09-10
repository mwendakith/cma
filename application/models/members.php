<?php

class Members extends MY_Model{
    const DB_TABLE = 'members';
    
    const DB_TABLE_PK = 'national_id';
    
    public $cma_no;
    
    public $national_id;
    
    public $surname;
    
    public $first_name;
    
    public $other_names;
    
    public $mobile_no;
    
    public $house_no;
    
    public $scc;
    
    public $nok_id;
    
    public $joining_date;
    
    public $outstation_id;
    
    public $post_id;
    
    public $division_id;
    
    public $vote_status;
    
    public $image;
    
}

