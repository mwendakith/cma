<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function member_count() {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('member_count');
        $this->load->view('announcements');
        $this->load->view('footer');
    }

    public function view_members() {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('view_members');
        $this->load->view('announcements');
        $this->load->view('footer');
    }

    public function candidacy() {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('candidacy');
        $this->load->view('announcements');
        $this->load->view('footer');
    }

    public function candidates() {
        $area = 0;
        switch ($this->input->post("division_id")) {
            case 1:
                $area = 1;
                break;
            case 2:
                $area = $this->session->userdata("archdiocese_id");
                break;
            case 3:
                $area = $this->session->userdata("diocese_id");
                break;
            case 4:
                $area = $this->session->userdata("deanery_id");
                break;
            case 5:
                $area = $this->session->userdata("parish_id");
                break;
            case 6:
                $area = $this->session->userdata("outstation_id");
                break;
            default:
                break;
        }
        $str = "";
        if ($this->input->post("status") == 1) {
            $this->db->insert('election', array(
                'list_id' => $area,
                'post_id' => $this->session->userdata("post_id"),
                'year' => date('Y'),
                'national_id' => $this->session->userdata("national_id")
            ));
            $str = "You have successfully submitted your candidacy.";
        }
        else{
            $this->db->delete('election', array(
                'national_id' => $this->session->userdata("national_id"),
                'year' => date('Y'),
                'list_id' => $area
            ));
            $str = "You have successfully recanted your candidacy.";
        }
        echo $str;
    }

}
