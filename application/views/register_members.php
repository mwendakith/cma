<div class="content">
	<h2>Member Registration</h2>
    <p>Welcome to the member registration form. Please enter the following details about the member.</p>
    <?php
    if($this->session->userdata('post_id') == 1){
	echo "<p>*Note that the Admin may enter the post and outstation of a member</p>";
			}
                        ?>
    <?php echo validation_errors();
        echo br(); 
        echo $this->upload->display_errors();
        echo br();
        ?>
    

    <?php
        $post_options = array(
            '1' => 'Administrator',
            '2' => 'Chairman',
            '3' => 'Vice-Chair',
            '4' => 'Assistant Vice-Chair',
            '5' => 'Secretary',
            '6' => 'Assistant Secretary',
            '7' => 'Organising Secretary',
            '8' => 'Assistant Organising Secretary',
            '9' => 'Treasurer',
        );

        $division_options = array(
            '1' => 'Nation',
            '2' => 'Archdiocese',
            '3' => 'Diocese',
            '4' => 'Deanery',
            '5' => 'Parish',
            '6' => 'Outstation',

        );


    ?>


    <?php echo form_open_multipart('sec_pages/member_registration'); ?>
    <table>
        <tr> <td>
    <?php echo form_label('National ID:', 'national_id'); ?></td><td>
    <?php echo form_input('national_id', set_value('national_id')); ?>
            </td></tr>

         <tr> <td>
    <?php echo form_label('CMA Number:', 'cma_no'); ?></td><td>
    <?php echo form_input('cma_no', set_value('cma_no')); ?>
            </td></tr>

          <tr> <td>
    <?php echo form_label('First Name:', 'first_name'); ?></td><td>
    <?php echo form_input('first_name', set_value('first_name')); ?>
            </td></tr>

          <tr> <td>
    <?php echo form_label('Surname:', 'surname'); ?></td><td>
    <?php echo form_input('surname', set_value('surname')); ?>
            </td></tr>

          <tr> <td>
    <?php echo form_label('Other names:', 'other_names'); ?></td><td>
    <?php echo form_input('other_names', set_value('other_names')); ?>
            </td></tr>

           <tr> <td>
    <?php echo form_label('Mobile Number:', 'mobile_no'); ?></td><td>
    <?php echo form_input('mobile_no', set_value('mobile_no')); ?>
            </td></tr>

           <tr> <td>
    <?php echo form_label('House Number:', 'house_no'); ?></td><td>
    <?php echo form_input('house_no', set_value('house_no')); ?>
            </td></tr>

          <tr> <td>
    <?php echo form_label('Small Christian Community:', 'scc'); ?></td><td>
    <?php echo form_input('scc', set_value('scc')); ?>
            </td></tr>


        <tr> <td>
    <?php echo form_label('Next of Kin Name:', 'nok_name'); ?></td><td>
    <?php echo form_input('nok_name', set_value('nok_name')); ?>
            </td></tr>

        <tr> <td>
    <?php echo form_label('Next of Kin Number:', 'nok_no'); ?></td><td>
    <?php echo form_input('nok_no', set_value('nok_no')); ?>
            </td></tr>

        <tr> <td>
    <?php echo form_label('Image:', 'img_file'); ?></td><td>
    <?php echo form_upload('img_file'); ?>
            </td></tr>

       <?php
            if($this->session->userdata('post_id') == 1){
                 echo "
            <tr>
                <td colspan=\"2\" style=\"font-weight:bold;\">Admin Options:</td>
            </tr>";

                echo "  <tr> <td>";
                echo form_label('Post Name:', 'post_id') . "</td><td>";
                echo form_dropdown('post_id', $post_options, "1");
                echo "</td></tr>";

                echo "  <tr> <td>";
                echo form_label('Division:', 'division_id') . "</td><td>";
                echo form_dropdown('division_id', $division_options, "1");
                echo "</td></tr>";
                
                echo "  <tr> <td>";
                echo form_label('Outstation:', 'outstation_id') . "</td><td>";
                echo form_dropdown('outstation_id', $outstation_options, "1");
                echo "</td></tr></table>";
                
            }
            
            else{
                echo "</table>";
                $hidden_data = array(
                    'post_id' => '10',
                    'division_id' => '6',
                    'outstation_id' => $this->session->userdata('outstation_id'),
                );
                echo form_hidden($hidden_data);
                
            }
            
     
           

            
            echo form_submit('mysubmit', 'Save Member');
            
            echo form_close();


       ?>





</div>