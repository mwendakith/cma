<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
    public function another(){
        
        $this->load->view("testing_1");
    }
    
    public function onto(){
        echo "Success";
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('path');
       // echo image2wbmp('images/headerimg.png');
        echo "<br />";
        echo base_url();
        echo "<br />";
        echo site_url();
        echo br();
        echo current_url();
        echo br();
       echo img('images/headerimg.png');
       echo br();
       echo "<img src'../../../images/headerimg.png' height=60 width=60>";
        
    }
    
    public function unto(){
        redirect("http://localhost/cma_total/cma_final/login.php");
    }
}



