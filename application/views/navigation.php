<div class="middle">
    <?php
    $post = $this->session->userdata('post_id');

    $page = $pages['page_name'];
    $username = $this->session->userdata('username');


    //get details of user logged in and check post in order to generate sidebar navigation menu
    $sidebar = "<div class=\"sidebar1\"><ul>";

    // if user is administrator
    if ($post == 1) {
        //sidebar markup	
        $sidebar .= "<li><a href=\"" . site_url("admin_pages/new_division") . "\"";
        if ($page == "new_division") {
            $sidebar .= "class = \"selected\"";
        }
        $sidebar .= ">NEW DIVISION</a></li>";


        $sidebar .= "<li><a href=\"" . site_url("admin_pages/elevate_division") . "\"";
        if ($page == "elevate_division") {
            $sidebar .= "class = \"selected\"";
        }
        $sidebar .= ">ELEVATE DIVISION</a></li>";


        $sidebar .= "<li><a href=\"" . site_url("sec_pages/member_registration") . "\"";
        if ($page == "registration") {
            $sidebar .= "class = \"selected\"";
        }
        $sidebar .= ">REGISTRATION</a></li>";
    } else {
        // if user is chairman or the vice or the assistant
        if ($post == 2 || $post == 3 || $post == 4) {
            //sidebar markup	
            $sidebar .= "<li><a href=\"" . site_url("chair_pages/election_status") . "\"";
            if ($page == "election_status") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">ELECTION STATUS</a></li>";




            $sidebar .= "<li><a href=\"" . site_url("chair_pages/manual_voting") . "\"";
            if ($page == "manual_polls") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">MANUAL POLLS</a></li>";
        }




        //if user is secretary or the assistant
        if ($post == 5 || $post == 6) {
            //sidebar markup	
            $sidebar .= "<li><a href=\"" . site_url("sec_pages/member_registration") . "\"";
            if ($page == "registration") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">REGISTRATION</a></li>";



            $sidebar .= "<li><a href=\"" . site_url("sec_pages/save_announcements") . "\"";
            if ($page == "announcements") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">ANNOUNCEMENTS</a></li>";
        }


        //if user is organising secretary or the assistant
        if ($post == 7 || $post == 8) {
            //sidebar markup	

            $sidebar .= "<li><a href=\"" . site_url("sec_pages/announcements") . "\"";
            if ($page == "announcements") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">ANNOUNCEMENTS</a></li>";
        }
        //if treasurer

        if ($post == 9) {
            //sidebar markup	

            $sidebar .= "<li><a href=\"view_contributions.php\" ";
            if ($page == "view_contribution") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">VIEW CONTRIBUTIONS</a></li>";
        }





//		$sidebar .= "<li><a href=\"view_all_members.php\" ";
//		if($page == "view_all_members" || $page == "view_members" || $page == "update_members"){
//			$sidebar .= "class = \"selected\"";
//		}
//		$sidebar .= ">VIEW ALL MEMBERS</a></li>";


        // Below are the links that are common to all users save the administrator
        // They are added to all users who aren't administrators
        
        $sidebar .= "<li><a href=\"" . site_url("pages/member_count") . "\"";
        if ($page == "member_count") {
            $sidebar .= "class = \"selected\"";
        }
        $sidebar .= ">MEMBER COUNT</a></li>";

        $sidebar .= "<li><a href=\"" . site_url("pages/view_members") . "\"";
        if ($page == "view_members") {
            $sidebar .= "class = \"selected\"";
        }
        $sidebar .= ">VIEW MEMBERS</a></li>";

        $sidebar .= "<li><a href=\"" . site_url("pages/candidacy") . "\"";
        if ($page == "candidacy") {
            $sidebar .= "class = \"selected\"";
        }
        $sidebar .= ">CANDIDACY</a></li>";

        


        if ($this->session->userdata("nation_status") == 1) {
            $sidebar .= "<li><a href=\"nation_voting_page.php\" ";
            if ($page == "nation_voting_page") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">NATION VOTING PAGE</a></li>";
        }

        if ($this->session->userdata("archdiocese_status") == 1) {
            $sidebar .= "<li><a href=\"archdiocese_voting_page.php\" ";
            if ($page == "archdiocese_voting_page") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">ARCHDIOCESE VOTING PAGE</a></li>";
        }

        if ($this->session->userdata("diocese_status") == 1) {
            $sidebar .= "<li><a href=\"diocese_voting_page.php\" ";
            if ($page == "diocese_voting_page") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">DIOCESE VOTING PAGE</a></li>";
        }

        if ($this->session->userdata("deanery_status") == 1) {
            $sidebar .= "<li><a href=\"deanery_voting_page.php\" ";
            if ($page == "deanery_voting_page") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">DEANERY VOTING PAGE</a></li>";
        }

        if ($this->session->userdata("parish_status") == 1) {
            $sidebar .= "<li><a href=\"parish_voting_page.php\" ";
            if ($page == "parish_voting_page") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">PARISH VOTING PAGE</a></li>";
        }

        if ($this->session->userdata("outstation_status") == 1) {
            $sidebar .= "<li><a href=\"outstation_voting_page.php\" ";
            if ($page == "outstation_voting_page") {
                $sidebar .= "class = \"selected\"";
            }
            $sidebar .= ">OUTSTATION VOTING PAGE</a></li>";
        }
    }

    $sidebar .= "</ul></div>";

    echo $sidebar;
    ?>