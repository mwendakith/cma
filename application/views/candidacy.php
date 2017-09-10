<div class="content">
    <h2>Candidacy</h2>

    <?php
    if ($this->session->userdata("post_id") == 10) {

        if ($this->session->userdata("outstation_status") == 1) {
            $str = "Welcome to the candidacy page. Here, you can submit your candidacy for the position of your choice. ";
            $str .= "<br /><br />";
            $str .= "<form action='" . site_url("pages/register_candidacy") . "' method='post' name='first_time'>";
            $str .= "<select name='post_level'>";
            $str .= "<option value=''>--Select a post--</option>";
            $str .= "<option value=2>Chairman</option> ";
            $str .= "<option value=3>Vice Chairman</option> ";
            $str .= "<option value=4>Assistant Vice Chairman</option> ";
            $str .= "<option value=5>Secretary</option> ";
            $str .= "<option value=6>Assistant Secretary</option> ";
            $str .= "<option value=7>Organising Secretary</option> ";
            $str .= "<option value=8>Assistant Organising Secretary</option> ";
            $str .= "<option value=9>Treasurer</option> ";
            $str .= "</select></form>";

            echo $str;
        } else {
            echo "The nomination stage is not active. Consult with the chairman on when it will open.";
        }
    } 
    
    else {
        echo "You may submit your candidacy on this page.";
        // Checks the level of the candidate and thus which level he may submit his candidacy
        echo "<br /> <br /><table><tr><td> Outstation candidacy.</td>";
        echo "<td><input type='button' onclick='candidate(6)' value='Submit Candidacy'  /> &nbsp;</td>";
        echo "<td><input type='button' onclick='uncandidate(6)' value='Unsubmit Candidacy'  /></td></tr>";

        $rank = $this->session->userdata("division_id");
        if ($rank < 6) {
            echo "<tr><td>Parish Candidacy.</td>";
            echo "<td><input type='button' onclick='candidate(5, 1)' value='Submit Candidacy'  /> &nbsp;</td>";
            echo "<td><input type='button' onclick='uncandidate(5, 0)' value='Unsubmit Candidacy'  /></td></tr>";
        }

        if ($rank < 5) {
            echo "<tr><td>Deanery Candidacy.</td>";
            echo "<td><input type='button' onclick='candidate(4, 1)' value='Submit Candidacy'  /> &nbsp;</td>";
            echo "<td><input type='button' onclick='uncandidate(4, 0)' value='Unsubmit Candidacy'  /></td></tr>";
        }

        if ($rank < 4) {
            echo "<tr><td> Diocese Candidacy.</td>";
            echo "<td><input type='button' onclick='candidate(3, 1)' value='Submit Candidacy'  /> &nbsp;</td>";
            echo "<td><input type='button' onclick='uncandidate(3, 0)' value='Unsubmit Candidacy'  /></td></tr>";
        }

        if ($rank < 3) {
            echo "<tr><td> Archdiocese Candidacy.</td>";
            echo "<td><input type='button' onclick='candidate(2, 1)' value='Submit Candidacy' /> &nbsp;</td>";
            echo "<td><input type='button' onclick='uncandidate(2, 0)' value='Unsubmit Candidacy'  /> </td></tr>";
        }

        if ($rank < 2) {
            echo "<tr><td> Nation Candidacy.</td>";
            echo "<td><input type='button' onclick='candidate(1, 1)' value='Submit Candidacy' /> &nbsp;</td>";
            echo "<td><input type='button' onclick='uncandidate(1, 0)' value='Unsubmit Candidacy' /></td></tr>";
        }
        echo "</table>";
    }
    
    
    ?>
        
    <p id='message'></p>
    
    <script src="<?php echo base_url('javascripts/jquery-2.1.1.min.js') ?>" type="text/javascript" charset="utf-8"> 
    
    </script>

    <script>
        function candidate(division, status){
            var form_data = {
            division_id: division,
            state: status
        };
        
        $.ajax({
            url: "<?php echo site_url('pages/candidates'); ?>",
            type: 'POST',
            data: form_data,
            success: function(msg){
                $("#message").empty().append(msg);
            }
        }
    
    </script>


</div>