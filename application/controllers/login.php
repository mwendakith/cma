<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
       $this->load->view('welcome_message');
    }

    public function other() {
        $query = $this->db->query('SELECT * FROM `users`');
        $this->load->library('table');
        echo $this->table->generate($query);
    }

    public function echoed($x) {
        echo $x;
    }

    public function login_page() {
        $this->load->view('header');
        $this->load->view('logger');
        $this->load->view('footer');
    }

    public function logged() {
        $username = $this->input->post('username');
        $hashed_password = sha1($this->input->post('password'));

        // $sql = "SELECT * FROM `users` WHERE `username`='{$username}'";
        $query = $this->db->get_where('users', array('username' => $username));

        if ($query->num_rows() == 1) {
            $row = $query->row();

            if ($row->hashed_password == $hashed_password) {
                $this->set_session($row->national_id);
            } else {
                $this->login_page();
            }
        } else {
            // username/password combo was not found in the database
            $this->login_page();
        }
    }

    public function set_session($nid) {
        $this->load->model("Members");

        $this->Members->load($nid);


        // $sql = 'SELECT `parish_id` FROM `outstation` WHERE `outstation_id`=' . $this->Members->outstation_id;
        $parish_query = $this->db->get_where('outstation', array('outstation_id' => $this->Members->outstation_id));
        $parish = $parish_query->row();

        // $sql = 'SELECT `deanery_id` FROM `parish` WHERE `parish_id`=' . $this->Members->parish_id;
        $deanery_query = $this->db->get_where('parish', array('parish_id' => $parish->parish_id));
        $deanery = $deanery_query->row();

        // $sql = 'SELECT `diocese_id` FROM `deanery` WHERE `deanery_id`=' . $this->Members->parish_id;
        $diocese_query = $this->db->get_where('deanery', array('deanery_id' => $deanery->deanery_id));
        $diocese = $diocese_query->row();

        // $sql = 'SELECT `archdiocese_id` FROM `diocese` WHERE `diocese_id`=' . $this->Members->parish_id;
        $archdiocese_query = $this->db->get_where('diocese', array('diocese_id' => $diocese->diocese_id));
        $archdiocese = $archdiocese_query->row();

        $nation_query = $this->db->get_where('archdiocese', array('archdiocese_id' => $archdiocese->archdiocese_id));
        $nation = $nation_query->row();

        $nat_query = $this->db->get('nation');
        $nat = $nat_query->row();

        $post_query = $this->db->get_where('posts', array('post_id' => $this->Members->post_id));
        $posts = $post_query->row();

        $this->load->library('session');

        $member = array(
            'national_id' => $this->Members->national_id,
            'post_id' => $this->Members->post_id,
            'division_id' => $this->Members->division_id,
            'first_name' => $this->Members->first_name,
            'surname' => $this->Members->surname,
            'post_name' => $posts->post_name,
            'outstation_id' => $this->Members->outstation_id,
            'parish_id' => $parish->parish_id,
            'deanery_id' => $deanery->deanery_id,
            'diocese_id' => $diocese->diocese_id,
            'archdiocese_id' => $archdiocese->archdiocese_id,
            'outstation_status' => $parish->election_status,
            'parish_status' => $deanery->election_status,
            'deanery_status' => $diocese->election_status,
            'diocese_status' => $archdiocese->election_status,
            'archdiocese_status' => $nation->election_status,
            'nation_status' => $nat->election_status,
        );

        $this->session->set_userdata($member);
        redirect("login/home");
    }

    public function home() {
        $this->load->view("header");
        $this->load->view("navigation");
        $this->load->view("homepage");
        $this->load->view("announcements");
        $this->load->view("footer");
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login/login_page');
    }

    public function edit_profile() {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('edit_profile');
        $this->load->view('announcements');
        $this->load->view('footer');
    }

}
