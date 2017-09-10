<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sec_pages extends CI_Controller {

    public function access_control() {
        if ($this->session->userdata('post_id') > 3 && $this->session->userdata('post_id') < 7) {
            return true;
        } else {
            redirect('login/home');
        }
    }

    public function member() {
        $daya = array('this' => 'that');
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('save_announcements', $daya);
        $this->load->view('announcements');
        $this->load->view('footer');
    }

    public function functionName() {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('register_members');
        $this->load->view('announcements');
        $this->load->view('footer');
    }

    public function member_registration() {

        if ($this->session->userdata('post_id') == 1 || $this->access_control()) {
            $this->load->library('form_validation');
            $this->db->select("outstation_id, name");
            $outstations = $this->db->get('outstation');
            $outstation_options = array();
            foreach ($outstations->result() as $rows) {
                $outstation_options[$rows->outstation_id] = $rows->name;
            }

            $config = array(
                'upload_path' => 'images',
                'allowed_types' => 'gif|jpg|png',
            );

            $this->load->library('upload', $config);

            $this->form_validation->set_rules('national_id', 'National ID', 'required|numeric|is_unique[members.national_id]');
            $this->form_validation->set_rules('cma_no', 'CMA Number', 'required|numeric');
            $this->form_validation->set_rules('surname', 'Surname', 'required');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|numeric');
            // $this->form_validation->set_rules('nok_no', 'Next of Kin Number', 'required|numeric');
            $this->form_validation->set_rules('nok_no', 'Next of Kin Number', 'required|numeric|is_unique[next_of_kin.nok_number]');
            // $this->form_validation->set_rules('nok_name', 'Next of Kin Name', 'required|numeric|is_unique[next_of_kin.nok_number]');

            $check_file_upload = FALSE;
            if (isset($FILES['img_file']['error']) && $FILES['img_file']['error'] != 4) {
                $check_file_upload = TRUE;
            }

            if (!$this->form_validation->run() || ($check_file_upload && !$this->upload->do_upload('img_file'))) {
                $this->load->view('header');
                $this->load->view('navigation');
                $this->load->view('register_members', $outstation_options);
                $this->load->view('announcements');
                $this->load->view('footer');
            } else {
                $this->load->model('Members');
                $member = new Members();
                $member->national_id = $this->input->post("national_id");
                $member->cma_no = $this->input->post("cma_no");
                $member->surname = $this->input->post("surname");
                $member->first_name = $this->input->post("first_name");
                $member->other_names = $this->input->post("other_names");
                $member->mobile_no = $this->input->post("mobile_no");
                $member->house_no = $this->input->post("house_no");
                $member->scc = $this->input->post("scc");
                // $member->nok_id = $this->input->post("NOK_ID");
                //  $member->joining_date = $this->input->post("Surname");

                if ($this->session->userdata('post_id') == 1) {
                    $member->outstation_id = $this->input->post("Outstation_ID");
                    $member = $this->input->post("Post");
                    $this->Members->division_id = $this->input->post("Division");
                } else {
                    $member->outstation_id = $this->session->userdata('outstation_id');
                    $member->post_id = 10;
                    $member->division_id = 6;
                }

                $upload_data = $this->upload->data();
                if (isset($upload_data['file_name'])) {
                    $member->image = $upload_data['file_name'];
                }
                $this->db->insert('next_of_kin', array(
                    'nok_name' => $this->input->post("nok_name"),
                    'nok_number' => $this->input->post("nok_no")
                ));
                $member->nok_id = $this->db->insert_id();
                $member->joining_date = date('Y-m-d');
                $member->vote_status = 0;

                // $member->save();

                $this->db->insert('members', $member);


                $new_user = array('national_id' => $this->input->post("national_id"), 'username' => $this->input->post("national_id"), 'hashed_password' => sha1('john316'));
                $this->db->insert('users', $new_user);

                if ($member->post_id != 10 || $member->post_id != 1) {
                    $this->reg_officials($member->national_id, $member->division_id, $member->post_id);
                }

                $this->member_registration();
            }
        }
    }

    public function reg_officials($national_id, $division, $post) {
        // Switch to determine the column being affected
        $post_name = "";
        switch ($post) {
            case 2:
                $post_name = "chairman";
                break;
            case 3:
                $post_name = "vice_chair";
                break;
            case 4:
                $post_name = "vice_chair2";
                break;
            case 5:
                $post_name = "secretary";
                break;
            case 6:
                $post_name = "assistant_sec";
                break;
            case 7:
                $post_name = "organising_sec";
                break;
            case 8:
                $post_name = "ass_organising_sec";
                break;
            case 9:
                $post_name = "treasurer";
                break;
            default:
                break;
        }
        
        $outstation = $this->session->userdata("outstation_id");
        $parish = $this->session->userdata("parish_id");
        $deanery = $this->session->userdata("deanery_id");
        $diocese = $this->session->userdata("diocese_id");
        $archdiocese = $this->session->userdata("archdiocese_id");

        switch ($division) {
            case 1:
                $this->db->where('list_id', 1);
                $this->db->update('officials_present', array($post_name => $national_id));


            case 2:
                $this->db->where('list_id', $archdiocese);
                $this->db->update('officials_present', array($post_name => $national_id));


            case 3:
                $this->db->where('list_id', $diocese);
                $this->db->update('officials_present', array($post_name => $national_id));


            case 4:
                $this->db->where('list_id', $deanery);
                $this->db->update('officials_present', array($post_name => $national_id));


            case 5:
                $this->db->where('list_id', $parish);
                $this->db->update('officials_present', array($post_name => $national_id));


            case 6:
                $this->db->where('list_id', $outstation);
                $this->db->update('officials_present', array($post_name => $national_id));
                break;

            default:
                break;
        }
    }

    public function registration() {

        $this->load->model('Members');
        $member = new Members();
        $member->national_id = $this->input->post("National_ID");
        $member->cma_no = $this->input->post("CMA_No");
        $member->surname = $this->input->post("Surname");
        $member->first_name = $this->input->post("First_Name");
        $member->other_names = $this->input->post("Other_Name");
        $member->mobile_no = $this->input->post("Mobile_No");
        $member->house_no = $this->input->post("House_No");
        $member->scc = $this->input->post("SCC");
        $member->nok_id = $this->input->post("NOK_ID");
        $member->joining_date = $this->input->post("Surname");

        if ($this->session->userdata('post_id') == 1) {
            $member->outstation_id = $this->input->post("Outstation_ID");
            $member = $this->input->post("Post");
            $this->Members->division_id = $this->input->post("Division");
        } else {
            $member->outstation_id = $this->session->userdata('outstation_id');
            $member->post_id = 10;
            $member->division_id = 6;
        }



        $config = array(
            'upload_path' => 'images',
            'allowed_types' => 'gif|jpg|png',
            ''
        );

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('national_id', 'National ID', 'required|numeric|is_unique[members.national_id]');
        $this->form_validation->set_rules('cma_no', 'CMA Number', 'required|numeric');
        $this->form_validation->set_rules('surname', 'Surname', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|numeric');
        $this->form_validation->set_rules('nok_no', 'Next of Kin Number', 'required|numeric');
        $this->form_validation->set_rules('nok_name', 'Next of Kin Name', 'required|numeric|is_unique[next_of_kin.nok_number]');

        $check_file_upload = FALSE;
        if (isset($FILES['img_file']['error']) && $FILES['img_file']['error'] != 4) {
            $check_file_upload = TRUE;
        }

        if (!$this->form_validation->run() || ($check_file_upload && !$this->upload->do_upload('img_file'))) {
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('member_registration');
            $this->load->view('announcements');
            $this->load->view('footer');
        } else {
            $upload_data = $this->upload->data();
            if (isset($upload_data['file_name'])) {
                $member->image = $upload_data['file_name'];
            }
            $this->db->insert('next_of_kin', array(
                'nok_name' => $this->input->post("nok_name"),
                'nok_number' => $this->input->post("nok_number")
            ));
            $member->nok_id = $this->db->insert_id();
            $member->joining_date = date('Y-m-d');

            $member->save();
            redirect('sec_pages/member_registration');
        }
    }

    public function save_announcements() {
        if ($this->access_control()) {
            $this->load->view('header');
            $this->load->view("navigation");
            $this->load->view('save_announcements');
            $this->load->view("announcements");
            $this->load->view('footer');


//            $this->db->where($table_id, $division);
//            $this->db->update($table, $data);
        }
    }

    public function update_announcements() {
        $announcement = $this->input->post('Announcement');
        $table = $this->input->post('Table');
        $table_id = $this->input->post('Table_ID');
        $division = $this->input->post('Division');

        $data = array(
            'announcement' => $announcement,
        );
        $sql = "UPDATE " . $table . " SET `announcements` = '" . $announcement . "' WHERE " . $table_id . "=" . $division;
        $this->db->query($sql);
        // $this->db->update($table, array('announcements' => $announcement), array($table_id => $division));
        $this->save_announcements();
    }

    

}
