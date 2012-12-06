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
            if( !($stmt = $mysqli->prepare("SELECT * FROM Person WHERE username=?") ) ) {
                $to_site_info .= "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
            }
            if (!$stmt->bind_param("s", $_POST['username'])) { // Adds variable to search with
		$to_site_info .= "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error . "<br>";
            }
            if (!$stmt->execute()) {
                $to_site_info .= "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "<br>";
            }else{
                $to_site_info .= "Login successful!<br>";
            }
            if (!$stmt->bind_result($username, $password, $fname, $lname, $dob, $gender, $email, $hometown_city, $hometown_state, $cur_city, $cur_state, $about)){
                $to_site_info .= "Error binding result: (" . $stmt->errno . ") " . $stmt->error . "<br>";
            }
            else {  // Print all the users info
                while($stmt->fetch()){
                    $to_site_info .= "Welcome to Project Z, " . $fname . " " . $lname . "!<br><br>";
                    $to_site_info .= "Now printing account information:<br>";
                    $to_site_info .= "Username: "           . $username . "<br>";
                    $to_site_info .= "Password: "           . $password . "<br>";
                    $to_site_info .= "Full Name: "          . $fname . " " . $lname . "<br>";
                    $to_site_info .= "Birthday: "           . $dob . "<br>";
                    $to_site_info .= "Gender: "             . $gender . "<br>";
                    $to_site_info .= "Email: "              . $email . "<br>";
                    $to_site_info .= "Hometown: "           . $hometown_city . ", " . $hometown_state . "<br>";
                    $to_site_info .= "Current Location: "   . $cur_city . ", " . $cur_state . "<br>";
                    $to_site_info .= "About Me: "           . $about . "<br>";
                }
            }
        }else{
            $to_site_info .= "Form Information is incorrect!<br>";
        }
    }
    
    function verify_reg(){
        return 0; // SUCCESS - Valid Info
    }