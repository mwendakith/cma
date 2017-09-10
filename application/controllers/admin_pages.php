<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_pages extends CI_Controller {

    public function access_control() {
        if ($this->session->userdata('post_id') == 1) {
            return true;
        }
    }

    public function new_division() {
        if ($this->access_control()) {
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('register_division');
            $this->load->view('announcements');
            $this->load->view('footer');
        }
    }

    public function elevate_division() {
        if ($this->access_control()) {
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('elevate_division');
            $this->load->view('announcements');
            $this->load->view('footer');
        }
    }

    /*
     * Services the Ajax script request from register_division
     */

    public function division_options() {
        //This get the division level of the foreign key
        // Once user decides to register a parish for example, divid="deanery"
        // This allows for the selection of the table
        // $y will be deanery_id thus allowing us to get the id and set it as the value for the option
        // the output will be the name of the deanery in this example

        $table = $this->input->post("table");

        $this->db->order_by("name");
        $result = $this->db->get($table);

        $primary_key = $this->input->post("primary");



        //This outputs the name of the foreign key as the option
        //It sets the value of the foreign key as the id of the foreign key
        //Sets the first option as blank with a null value
        echo "<option value=''>Choose a division below. </option>";
        foreach ($result->result() as $row) {
            echo "<option value=" . $row->$primary_key . ">" . $row->name . "</option>";
        }
    }

    /*
     * Services the Ajax script request from 
     */

    public function elevation_options($table) {

        $table = $this->input->post("table");

        $this->db->order_by("name");
        $result = $this->db->get($table);

        $primary_key = $this->input->post("primary");



        echo "<option value=''>Choose a place below </option>";
        foreach ($result->result() as $row) {
            echo "<option value=" . $row->$primary_key . ">" . $row->name . "</option>";
        }
    }

    public function reg_div() {
        $division = $this->input->post("Division_level");
        $name = $this->input->post("Division_name");
        $foreign_key = $this->input->post("key");
        switch ($division) {
            case 2:
                $table_name = "archdiocese";
                $index_colname = "Nation_id";
                break;
            case 3:
                $table_name = "diocese";
                $index_colname = "archdiocese_id";
                break;
            case 4:
                $table_name = "deanery";
                $index_colname = "diocese_id";
                break;
            case 5:
                $table_name = "parish";
                $index_colname = "deanery_id";
                break;
            case 6:
                $table_name = "Outstation";
                $index_colname = "parish_id";
                break;
            default:
                break;
        }
        $table_name;
        $data = array('name' => $name, $index_colname => $foreign_key);
        $this->db->insert($table_name, $data);

        $key = $this->db->insert_id();
        $official_data = array('list_id' => $key);

        $this->db->insert('officials_present', $official_data);
        $this->db->insert('officials', $official_data);

        $this->new_division();
    }

    public function reg_elevation() {
        // This retrieves all the data necessary to upgrade the division
        $div = $this->input->post("Division_level");
        $divid = $this->input->post("Division_id");
        $table_name;
        $index_colname;
        $table_id;
        $foreign_key;
        $new_foreign;
        $new_foreign_key;
        $division_name;
        $new_table;
        $new_primary;

// $divid is the present primary key for the division being elevated
// $table_name represents the table of the division being elevated
// $table_id represents the name of the primary key of the division being elevated
// $index_colname represents the name of the column of the foreign key exisiting in the affected table
// $new_table represents the name of the table where the elevated division will now be stored in
// $new_foreign represents the foreign key column name that the elevated division will have
// $foreign_key indicates the foreign key of the elevated division
// $new_primary is the new primary key of the elevated division
        switch ($div) {

            case 3:
                $table_name = "diocese";
                $table_id = "diocese_id";
                $index_colname = "archdiocese_id";
                $new_table = "archdiocese";
                $new_foreign = "nation_id";
                break;
            case 4:
                $table_name = "deanery";
                $table_id = "deanery_id";
                $index_colname = "diocese_id";
                $new_table = "diocese";
                $new_foreign = "archdiocese_id";
                break;
            case 5:
                $table_name = "parish";
                $table_id = "parish_id";
                $index_colname = "deanery_id";
                $new_table = "deanery";
                $new_foreign = "diocese_id";
                break;
            case 6:
                $table_name = "outstation";
                $table_id = "outstation_id";
                $index_colname = "parish_id";
                $new_table = "parish";
                $new_foreign = "deanery_id";
                break;
            default:
                break;
        }

        $data = array($table_id => $divid);
        // Selects all the information about the division being elevated
        $elevation = $this->db->get_where($table_name, $data);
        $upgrade = $elevation->row();
        $division_name = $upgrade->name;
        $foreign_key = $upgrade->$index_colname;


        // Selects the foreign key of the divisions's foreign key
        // Example, for an elevated parish it'll get the key of its diocese
        // This is because it will cease to exist in its deanery and has to be saved in the diocese
        $data2 = array($index_colname => $foreign_key);
        $new_level = $this->db->get_where($new_table, $data2);
        $new_upgrade = $new_level->row();
        $new_foreign_key = $new_upgrade->$new_foreign;
        echo $new_foreign_key;

        // This code creates the elevated division
        // In the example above, it creates a deanery with the foreign key being 
        // The diocese which is the foreign key of the deanery it used to belong to
        $this->db->insert($new_table, array('name' => $division_name, $new_foreign => $new_foreign_key));

        // This returns the primary key that was auto-generated upon creation of the elevated division
        $new_primary = $this->db->insert_id();

        // This transfers the division to the newly created elevated division
        // In the example above, the parish is still existing
        // Its foreign key is updated to the newly created deanery
        $this->db->update($table_name, array($index_colname => $new_primary), array($table_id => $divid));
        $this->elevate_division();
    }

    public function reg_members() {
        if ($this->access_control() || ($this->session->userdata('post_id') < 9 && $this->session->userdata('post_id') > 4)) {
            $this->db->select("outstation_id, name");
            $outstations = $this->db->get('outstation');
            $outstation_options = array();
            foreach ($outstations->result() as $rows) {
                $outstation_options[$rows->outstation_id] = $rows->name;
            }

            $this->load->view('header');
            $this->load->view('register_members', $outstation_options);
            $this->load->view('register_division');

            $config = array(
                'upload_path' => 'upload',
                'allowed_types' => 'gif|jpg|png|jpeg|pjpeg',
                'max_size' => '250',
            );
            $this->load->library('upload', $config);
        }
    }

    

}
