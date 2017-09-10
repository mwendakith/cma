<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chair_pages extends CI_Controller {

    public function access_control() {
        if ($this->session->userdata('post_id') > 1 && $this->session->userdata('post_id') < 6) {
            return true;
        } else {
            redirect('login/home');
        }
    }

    public function manual_voting() {
        if ($this->access_control()) {
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('manual_polls');
            $this->load->view('announcements');
            $this->load->view('footer');
        }
    }

    public function election_status() {
        if ($this->access_control()) {
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('election_status');
            $this->load->view('announcements');
            $this->load->view('footer');
        }
    }

    public function manual_voting_list() {
        $division = $this->input->post("division_id");
        $area = 0;
        $chair_sql = "";
        $vice_chair_sql = "";
        $ass_vice_chair_sql = "";
        $sec_sql = "";
        $ass_sec_sql = "";
        $org_sec_sql = "";
        $ass_org_sec_sql = "";
        $treasurer_sql = "";


// Switches 
        switch ($division) {
            case 1:
                // Area get the id of the division
                $area = 1;
                //Below are the sql statements required to populate the select tags with viable candidates

                $chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=2";
                $vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=3";
                $ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=4";
                $sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=5";
                $ass_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=6";
                $org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=7";
                $ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=8";
                $treasurer_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=9";
                break;



            case 2:
                $area = $this->session->userdata("archdiocese_id");
                //Below are the sql statements required to populate the select tags with viable candidates

                $chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=2 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID` IN (SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";


                $vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=3 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID` IN (SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";


                $ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=4 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID` IN (SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";


                $sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=5 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID` IN (SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";


                $ass_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=6 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID` IN (SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";


                $org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=7 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID` IN (SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";


                $ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=8 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID` IN (SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";


                $treasurer_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=9 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID` IN (SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";

                break;




            case 3:
                $area = $this->session->userdata("diocese_id");
                //Below are the sql statements required to populate the select tags with viable candidates

                $chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=2 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";

                $vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=3 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";

                $ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=4 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";

                $sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=5 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";

                $ass_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=6 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";

                $org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=7 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";

                $ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=8 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";

                $treasurer_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=9 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";

                break;




            case 4:
                $area = $this->session->userdata("deanery_id");
                //Below are the sql statements required to populate the select tags with viable candidates

                $chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=2 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";

                $vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=3 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";

                $ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=4 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";

                $sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=5 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";

                $ass_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=6 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";

                $org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=7 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";

                $ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=8 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";

                $treasurer_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=9 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";

                break;




            case 5:
                $area = $this->session->userdata("parish_id");
                //Below are the sql statements required to populate the select tags with viable candidates

                $chair_sql = "SELECT * FROM `Members` WHERE `Post_ID`=2 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";

                $vice_chair_sql = "SELECT * FROM `Members` WHERE `Post_ID`=3 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";

                $ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Post_ID`=4 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";

                $sec_sql = "SELECT * FROM `Members` WHERE `Post_ID`=5 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";

                $ass_sec_sql = "SELECT * FROM `Members` WHERE `Post_ID`=6 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";

                $org_sec_sql = "SELECT * FROM `Members` WHERE `Post_ID`=7 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";

                $ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Post_ID`=8 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";

                $treasurer_sql = "SELECT * FROM `Members` WHERE `Post_ID`=9 AND `Outstation_ID` IN (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";
                break;




            case 6:
                $area = $this->session->userdata("outstation_id");
                //Below are the sql statements required to populate the select tags with viable candidates

                $chair_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
                $vice_chair_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
                $ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
                $sec_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
                $ass_sec_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
                $org_sec_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
                $ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
                $treasurer_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
                break;

            default:
                break;
        }


        echo "<table>";

//Select tag for the Chairman
        echo "<tr><td>Chairman &nbsp;</td>";
        echo "<td><select name='Chairman'>";
        echo "<option value=''></option>";
        /* $result = mysql_query($chair_sql);
          while ($row = mysql_fetch_array($result)) {
          echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
          }
          mysql_free_result($result); */

        $new_query = $this->db->query($chair_sql);
        foreach ($new_query->result() as $my_row) {
            echo "<option value='" . $my_row->national_id . "'> {$my_row->surname} &nbsp; {$my_row->first_name} </option>";
        }
        $new_query->free_result();

        echo "</select></td></tr>";


// Select tag for the Vice Chair
        echo "<tr><td>Vice Chairman &nbsp;</td>";
        echo "<td><select name='Vice'>";
        echo "<option value=''></option>";
        /* $result = mysql_query($vice_chair_sql);
          while ($row = mysql_fetch_array($result)) {
          echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
          }
          mysql_free_result($result); */

        $new_query = $this->db->query($vice_chair_sql);
        foreach ($new_query->result() as $my_row) {
            echo "<option value='" . $my_row->national_id . "'> {$my_row->surname} &nbsp; {$my_row->first_name} </option>";
        }
        $new_query->free_result();
        echo "</select></td></tr>";


// Select tag for the Assistant Vice Chair -->
        echo "<tr><td>Assistant Vice Chairman &nbsp;</td>";
        echo "<td><select name='Ass_Vice'>";
        echo "<option value=''></option>";
        /* $result = mysql_query($ass_vice_chair_sql);
          while ($row = mysql_fetch_array($result)) {
          echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
          }
          mysql_free_result($result); */

        $new_query = $this->db->query($ass_vice_chair_sql);
        foreach ($new_query->result() as $my_row) {
            echo "<option value='" . $my_row->national_id . "'> {$my_row->surname} &nbsp; {$my_row->first_name} </option>";
        }
        $new_query->free_result();

        echo "</select></td></tr>";


// Select tag for the Secretary -->
        echo "<tr><td>Secretary &nbsp;</td>";
        echo "<td><select name='Sec'>";
        echo "<option value=''></option>";
        /* $result = mysql_query($sec_sql);
          while ($row = mysql_fetch_array($result)) {
          echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
          }
          mysql_free_result($result); */

        $new_query = $this->db->query($sec_sql);
        foreach ($new_query->result() as $my_row) {
            echo "<option value='" . $my_row->national_id . "'> {$my_row->surname} &nbsp; {$my_row->first_name} </option>";
        }
        $new_query->free_result();

        echo "</select></td></tr>";


// Select tag for the Assistant Secretary -->
        echo "<tr><td>Assistant Secretary &nbsp;</td>";
        echo "<td><select name='Ass_Sec'>";
        echo "<option value=''></option>";
        /* $result = mysql_query($ass_sec_sql);
          while ($row = mysql_fetch_array($result)) {
          echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
          }
          mysql_free_result($result); */

        $new_query = $this->db->query($ass_sec_sql);
        foreach ($new_query->result() as $my_row) {
            echo "<option value='" . $my_row->national_id . "'> {$my_row->surname} &nbsp; {$my_row->first_name} </option>";
        }
        $new_query->free_result();

        echo "</select></td></tr>";


// Select tag for the Organising Secretary -->
        echo "<tr><td>Organising Secretary &nbsp;</td>";
        echo "<td><select name='Org_Sec'>";
        echo "<option value=''></option>";
        /* $result = mysql_query($org_sec_sql);
          while ($row = mysql_fetch_array($result)) {
          echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
          }
          mysql_free_result($result); */

        $new_query = $this->db->query($org_sec_sql);
        foreach ($new_query->result() as $my_row) {
            echo "<option value='" . $my_row->national_id . "'> {$my_row->surname} &nbsp; {$my_row->first_name} </option>";
        }
        $new_query->free_result();

        echo "</select></td></tr>";


// Select tag for the Assistant Organising Secretary -->
        echo "<tr><td>Assistant Organising Secretary &nbsp;</td>";
        echo "<td><select name='Ass_Org'>";
        echo "<option value=''></option>";
        /* $result = mysql_query($ass_org_sec_sql);
          while ($row = mysql_fetch_array($result)) {
          echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
          }
          mysql_free_result($result); */

        $new_query = $this->db->query($ass_org_sec_sql);
        foreach ($new_query->result() as $my_row) {
            echo "<option value='" . $my_row->national_id . "'> {$my_row->surname} &nbsp; {$my_row->first_name} </option>";
        }
        $new_query->free_result();

        echo "</select></td></tr>";


// Select tag for the Treasurer
        echo "<tr><td>Treasurer &nbsp;</td>";
        echo "<td><select name='Treasurer'>";
        echo "<option value=''></option>";
        /* $result = mysql_query($treasurer_sql);
          while ($row = mysql_fetch_array($result)) {
          echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
          }
          mysql_free_result($result); */

        $new_query = $this->db->query($treasurer_sql);
        foreach ($new_query->result() as $my_row) {
            echo "<option value='" . $my_row->national_id . "'> {$my_row->surname} &nbsp; {$my_row->first_name} </option>";
        }
        $new_query->free_result();


        echo "</select> </td></tr>";

        echo "<input name='Division' type='hidden' value='" . $division . "' />";
        echo "<input name='Division_id' type='hidden' value='" . $area . "' />";

        echo "<tr><td><input type='submit' value='Submit'/></td><td></td></tr>";
        echo "</table>";
    }

    public function save_officials() {
        $date = getdate();
        $year = $date['year'];

        $division = $this->input->post("Division");
        $division_id = $this->input->post("Division_id");
        $new_chair = $this->input->post("Chairman");
        $new_vice = $this->input->post("Vice");
        $new_ass_vice = $this->input->post("Ass_Vice");
        $new_sec = $this->input->post("Sec");
        $new_ass_sec = $this->input->post("Ass_Sec");
        $new_org_sec = $this->input->post("Org_Sec");
        $new_ass_org_sec = $this->input->post("Ass_Org");
        $new_treasurer = $this->input->post("Treasurer");

        // Updates the officials table

        $data = array(
            'list_id' => $division_id,
            'year' => $year,
            'chairman' => $new_chair,
            'vice_chair' => $new_vice,
            'vice_chair2' => $new_ass_vice,
            'secretary' => $new_sec,
            'assistant_sec' => $new_ass_sec,
            'organising_sec' => $new_org_sec,
            'ass_organising_sec' => $new_ass_org_sec,
            'treasurer' => $new_treasurer,
        );

        $this->db->insert('officials', $data);

        // Gets the list of existing officials
        $sql = "SELECT * FROM `Officials_Present` WHERE `List_ID`='{$division_id}'";
        $old_list = $this->db->get_where('officials_present', array('list_id' => $division_id));
        $old = $old_list->row();
        $old_chair = $old->chairman;
        $old_vice = $old->vice_chair;
        $old_ass_vice = $old->vice_chair2;
        $old_sec = $old->secretary;
        $old_ass_sec = $old->assistant_sec;
        $old_org_sec = $old->organising_sec;
        $old_ass_org_sec = $old->ass_organising_sec;
        $old_treasurer = $old->treasurer;
        $old_list->free_result();

        // This is the existing rank of the incumbents
        $rank;

        // This is the rank of a losing incumbent
        $demote;

        if ($division == 1) {
            $rank = 1;
            $demote = 2;
        } else if ($division == 2) {
            $rank = 2;
            $demote = 3;
        } else if ($division == 3) {
            $rank = 3;
            $demote = 4;
        } else if ($division == 4) {
            $rank = 4;
            $demote = 5;
        } else if ($division == 5) {
            $rank = 5;
            $demote = 6;
        } else {
            $rank = 6;
            $demote = 6;
        }




        // Checks if the incumbents have been reelected
        // If not it demotes them before promoting the newcomer
        // Otherwise no change happens
        
        // Chairman
        if ($new_chair != $old_chair) {
            if ($rank == 6) {
                $this->db->update('members', array('post_id' => '10'), array('national_id' => $old_chair));
                $this->db->update('members', array('post_id' => '2'), array('national_id' => $new_chair));
            } else {
                $this->db->update('members', array('division_id' => $demote), array('national_id' => $old_chair));
                $this->db->update('members', array('division_id' => $rank), array('national_id' => $new_chair));
            }
        }

        // Vice Chairman
        if ($new_vice != $old_vice) {
            if ($rank == 6) {
                $this->db->update('members', array('post_id' => '10'), array('national_id' => $old_vice));
                $this->db->update('members', array('post_id' => '3'), array('national_id' => $new_vice));
            } else {
                $this->db->update('members', array('division_id' => $demote), array('national_id' => $old_vice));
                $this->db->update('members', array('division_id' => $rank), array('national_id' => $new_vice));
            }
        }

        // Assistant Vice Chairman
        if ($new_ass_vice != $old_ass_vice) {
            if ($rank == 6) {
                $this->db->update('members', array('post_id' => '10'), array('national_id' => $old_ass_vice));
                $this->db->update('members', array('post_id' => '4'), array('national_id' => $new_ass_vice));
            } else {
                $this->db->update('members', array('division_id' => $demote), array('national_id' => $old_ass_vice));
                $this->db->update('members', array('division_id' => $rank), array('national_id' => $new_ass_vice));
            }
        }

        // Secretary
        if ($new_sec != $old_sec) {
            if ($rank == 6) {
                $this->db->update('members', array('post_id' => '10'), array('national_id' => $old_sec));
                $this->db->update('members', array('post_id' => '5'), array('national_id' => $new_sec));
            } else {
                $this->db->update('members', array('division_id' => $demote), array('national_id' => $old_sec));
                $this->db->update('members', array('division_id' => $rank), array('national_id' => $new_sec));
            }
        }

        // Assistant Secretary
        if ($new_ass_sec != $old_ass_sec) {
            if ($rank == 6) {
                $this->db->update('members', array('post_id' => '10'), array('national_id' => $old_ass_sec));
                $this->db->update('members', array('post_id' => '6'), array('national_id' => $new_ass_sec));
            } else {
                $this->db->update('members', array('division_id' => $demote), array('national_id' => $old_ass_sec));
                $this->db->update('members', array('division_id' => $rank), array('national_id' => $new_ass_sec));
            }
        }

        // Organising Secretary
        if ($new_org_sec != $old_org_sec) {
            if ($rank == 6) {
                $this->db->update('members', array('post_id' => '10'), array('national_id' => $old_org_sec));
                $this->db->update('members', array('post_id' => '7'), array('national_id' => $new_org_sec));
            } else {
                $this->db->update('members', array('division_id' => $demote), array('national_id' => $old_org_sec));
                $this->db->update('members', array('division_id' => $rank), array('national_id' => $new_org_sec));
            }
        }

        // Assistant Organising Secretary
        if ($new_ass_org_sec != $old_ass_org_sec) {
            if ($rank == 6) {
                $this->db->update('members', array('post_id' => '10'), array('national_id' => $old_ass_org_sec));
                $this->db->update('members', array('post_id' => '8'), array('national_id' => $new_ass_org_sec));
            } else {
                $this->db->update('members', array('division_id' => $demote), array('national_id' => $old_ass_org_sec));
                $this->db->update('members', array('division_id' => $rank), array('national_id' => $new_ass_org_sec));
            }
        }

        // Treasurer
        if ($new_treasurer != $old_treasurer) {
            if ($rank == 6) {
                $this->db->update('members', array('post_id' => '10'), array('national_id' => $old_treasurer));
                $this->db->update('members', array('post_id' => '9'), array('national_id' => $new_treasurer));
            } else {
                $this->db->update('members', array('division_id' => $demote), array('national_id' => $old_treasurer));
                $this->db->update('members', array('division_id' => $rank), array('national_id' => $new_treasurer));
            }
        }
        
        $officials_present = array(
            'chairman' => $new_chair,
            'vice_chair' => $new_vice,
            'vice_chair2' => $new_ass_vice,
            'secretary' => $new_sec,
            'assistant_sec' => $new_ass_sec,
            'organising_sec' => $new_org_sec,
            'ass_organising_sec' => $new_ass_org_sec,
            'treasurer' => $new_treasurer,
        );
        $this->db->update('officials_present', $officials_present, array('list_id' => $division_id));
        redirect('login/home');
    }

}
