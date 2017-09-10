<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test2 extends CI_Controller {
     public function un(){
        echo "Trial 2.";
    }
    
    public function unto(){
        redirect("test2/un");
    }
}