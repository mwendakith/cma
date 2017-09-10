<div class="content">
<h2>View Members</h2>
<h3><?php 
    $outstation_name = $this->db->get_where('outstation', array('outstation_id' => $this->session->userdata("outstation_id")));
    $name = $outstation_name->row();
    echo $name->name;
    
    
    
?></h3>

<table id="members_table">
    <th>Name</th><th>Mobile Number</th><th>Post</th><th>Rank</th><th>View Profile</th>
    <?php 
            $this->db->order_by('surname', 'desc');
            $members = $this->db->get_where('members', array('outstation_id' => $this->session->userdata("outstation_id")));
            foreach ($members->result() as $member_row) {
                                
                echo "<tr> <td> " . $member_row->surname . " " . $member_row->first_name . "</td><td>" . $member_row->mobile . "</td><td>";
                
                $query = $this->db->get_where('posts', array('post_id' => $member_row->post_id), 1);
                $post_array = $query->row();
                echo $post_array->post_name;
                $query->free_result();
                echo "</td><td>";
                
                
                $query = $this->db->get_where('divisions', array('division_id' => $member_row->division_id), 1);
                $division_array = $query->row();
                echo $division_array->division_name;
                $query->free_result();
                echo "</td><td>";
                
                $link_array = array('sec_pages', 'view_profile', $member_row->national_id);
                echo anchor($link_array, 'View Profile', array('title' => "View Profile"));
                echo "</td></tr>";
                
            }
            
            
            
            ?>
    
</table>



</div>