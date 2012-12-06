<?php
// ===============================================================
// * Filename: run_registration.php
// * Author: John Zeller
// * Date Created: December 5, 2012
// * Recently Updated: December 6, 2012
// * ------
// * Notes:
// *    Currently, POST resends form data if you hit refresh after a successful form submission
//          Using header() is not working like it should be
// * =============================================================

    if(isset($_POST['register_submit'])){
        $to_site_info = "";
        /* Check that inputs are good */
        if( verify_reg() != 1 ){ // Checks to see if form was filled out correctly. Doesn't accept if not.
            $mysqli = connect();
            if( !($stmt = $mysqli->prepare("INSERT INTO Person(username, password, fname, lname, dob, gender, email)" .
                                           "VALUES ('" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['fname'] . "', '" .
                                                         $_POST['lname'] . "', '" . $_POST['dob'] . "', '" . $_POST['gender'] . "', '" .
                                                         $_POST['email'] . "')") ) ) {
                $to_site_info .= "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
            }
            if (!$stmt->execute()){
                $to_site_info .= "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "<br>";
            }else{
                $to_site_info .= "Registration successful!<br>";
            }
        }else{
            $to_site_info .= "Form Information is incorrect!<br>";
        }
    }else if(isset($_POST['login_submit'])){
        $to_site_info = "";
        /* Check that inputs are good */
        if( verify_reg() != 1 ){ // Checks to see if form was filled out correctly. Doesn't accept if not.
            $mysqli = connect();
            if( !($stmt = $mysqli->prepare("SELECT username, password, fname, lname, dob, gender, email, hometown_city, 
                                            hometown_state, cur_city, cur_state, about FROM Person WHERE username=?") ) ) {
                $to_site_info .= "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
            }
            if (!$stmt->bind_param("ssssssssssss", $_POST['username'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['dob'],
                                                    $_POST['gender'], $_POST['email'], $_POST['hometown_city'], $_POST['hometown_state'],
                                                    $_POST['cur_city'], $_POST['cur_state'], $_POST['about'])) {
		$to_site_info .= "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error . "<br>";
            }
            if (!$stmt->execute()) {
                $to_site_info .= "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "<br>";
            }else{
                $to_site_info .= "Login successful!<br>";
            }
            if (!$stmt->bind_result($name, $awesome)){
                $to_site_info .= "Error binding result: (" . $stmt->errno . ") " . $stmt->error . "<br>";
            }
            else {  // Print all the users info
                $to_site_info .= $username . ", " . $password . ", " . $fname . ", " . $lname . ", " . $dob . ", " . $gender . ", " . $email . "";
                $to_site_info .= ", " . $hometown_city . ", " . $hometown_state . ", " . $cur_city . ", " . $cur_state . ", " . $about . "<br>";
            }
        }else{
            $to_site_info .= "Form Information is incorrect!<br>";
        }
    }
    
    function verify_reg(){
        return 0; // SUCCESS - Valid Info
    }