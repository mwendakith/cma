<div class="sidebar2">
<?php 
    $page = "announcements";
    
    $sql = "SELECT * FROM `nation` WHERE `nation_id` = 1";
    $nation = $this->db->query($sql);
    $row1 = $nation->row();
    echo "<h4> Kenya</h4> <br /><br />";
    echo $row1->announcements;
    echo "<br /><br />";
 
    $sql = "SELECT * FROM `archdiocese` WHERE `archdiocese_id` = " . $this->session->userdata('archdiocese_id');
    $archdiocese = $this->db->query($sql);
    $row2 = $archdiocese->row();
    echo "<h4> " . $row2->name . "</h4> <br /><br />";
    echo $row2->announcements;
     echo "<br /><br />";
    
     $sql = "SELECT * FROM `diocese` WHERE `diocese_id` = " . $this->session->userdata('diocese_id');
    $diocese = $this->db->query($sql);
    $row3 = $diocese->row();
    echo "<h4> " . $row3->name . "</h4> <br /><br />";
    echo $row3->announcements;
     echo "<br /><br />";
    
     $sql = "SELECT * FROM `deanery` WHERE `deanery_id` = " . $this->session->userdata('deanery_id');
    $deanery = $this->db->query($sql);
    $row4 = $deanery->row();
    echo "<h4> " . $row4->name . "</h4> <br /><br />";
    echo $row4->announcements;
     echo "<br /><br />";
    
     $sql = "SELECT * FROM `parish` WHERE `parish_id` = " . $this->session->userdata('parish_id');
    $parish = $this->db->query($sql);
    $row5 = $parish->row();
    echo "<h4> " . $row5->name . "</h4> <br /><br />";
    echo $row5->announcements;
     echo "<br /><br />";
    
     $sql = "SELECT * FROM `outstation` WHERE `outstation_id` = " . $this->session->userdata('outstation_id');
    $out = $this->db->query($sql);
    $row6 = $out->row();
    echo "<h4> " . $row6->name . "</h4> <br /><br />";
    echo $row6->announcements;

?>
</div>

  <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
