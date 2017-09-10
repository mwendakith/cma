<div class="content">
<h2>Number of Members</h2>
<p>
    The following are the number of members in each division.
</p>

<?php 
echo br();
$division = $this->session->userdata("division_id");
switch ($division) {
    case 1:
        echo "<h3> Kenya</h3>" . br() .  "<p> The total number of members is " . $this->db->count_all('members') . ".</p>";
        echo br(2);
    case 2:
        $archdiocese = $this->db->get_where('archdiocese', array('archdiocese_id' => $this->session->userdata("archdiocese_id")));
        $arch_row = $archdiocese->row();
        $sql = "SELECT COUNT(national_id) AS my_count FROM members WHERE outstation_id IN ";
        $sql .=  "(SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID` IN (SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$arch_row->archdiocese_id}')))) ";
        $arch_count = $this->db->query($sql);
        $arch_row_count = $arch_count->row();
        echo "<h3>" . $arch_row->name . "</h3>" . br() . "<p> The total number of members is " . $arch_row_count->my_count . ".</p>" . br(2);
        
    case 3:
        $diocese = $this->db->get_where('diocese', array('diocese_id' => $this->session->userdata("diocese_id")));
        $dio_row = $diocese->row();
        $sql = "SELECT COUNT(national_id) AS my_count FROM members WHERE outstation_id IN ";
        $sql .= "(SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID` IN (SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$dio_row->diocese_id}')))";
        $dio_count = $this->db->query($sql);
        $dio_row_count = $dio_count->row();
        echo "<h3>" . $dio_row->name . "</h3>" . br() . "<p> The total number of members is " . $dio_row_count->my_count . ".</p>" . br(2);
        
    case 4:
        $deanery = $this->db->get_where('deanery', array('deanery_id' => $this->session->userdata("deanery_id")));
        $dea_row = $deanery->row();
        $sql = "SELECT COUNT(national_id) AS my_count FROM members WHERE outstation_id IN ";
        $sql .= "(SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID` IN (SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$dea_row->deanery_id}'))";
        $dea_count = $this->db->query($sql);
        $dea_row_count = $dea_count->row();
        echo "<h3>" . $dea_row->name . "</h3>" . br() . "<p> The total number of members is " . $dea_row_count->my_count . ".</p>" . br(2);
        
    case 5:
        $parish = $this->db->get_where('parish', array('parish_id' => $this->session->userdata("parish_id")));
        $pae_row = $parish->row();
        $sql = "SELECT COUNT(national_id) AS my_count FROM members WHERE outstation_id IN ";
        $sql .= "(SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$pae_row->parish_id}')";
        $pae_count = $this->db->query($sql);
        $pae_row_count = $pae_count->row();
        echo "<h3>" . $pae_row->name . "</h3>" . br() . "<p> The total number of members is " . $pae_row_count->my_count . ".</p>" . br(2);
        
    case 6:
        $outstation = $this->db->get_where('outstation', array('outstation_id' => $this->session->userdata("outstation_id")));
        $out_row = $outstation->row();
        $sql = "SELECT COUNT(national_id) AS my_count FROM members WHERE outstation_id = '{$out_row->outstation_id}'";
        $out_count = $this->db->query($sql);
        $out_row_count = $out_count->row();
        echo "<h3>" . $out_row->name . "</h3>" . br() . "<p> The total number of members is " . $out_row_count->my_count . ".</p>" . br(2);
        

        

    default:
        break;
}
        



?>



</div>