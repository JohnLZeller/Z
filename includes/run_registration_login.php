<?php
// ===============================================================
// * Filename: run_registration_login.php
// * Author: John Zeller
// * Date Created: December 5, 2012
// * Recently Updated: December 7, 2012
// * ------
// * Notes:
// *    Currently, POST resends form data if you hit refresh after a successful form submission
//          Using header() is not working like it should be
// * =============================================================
    
    if(isset($_POST['register_submit'])){
        $to_site_info = "";
        /* Check that inputs are good */
        if( verify_reg() == "SUCCESS" ){ // Checks to see if form was filled out correctly. Doesn't accept if not.
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
            $to_site_info .= verify_reg();
        }
    }else if(isset($_POST['login_submit'])){
        $to_site_info = "";
        /* Check that inputs are good */
        if( verify_reg() == "SUCCESS" ){ // Checks to see if form was filled out correctly. Doesn't accept if not.
            $mysqli = connect();
            if( !($stmt = $mysqli->prepare("SELECT * FROM Person WHERE username=? AND password=?") ) ) {
                $to_site_info .= "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
            }
            if (!$stmt->bind_param("ss", $_POST['username'], $_POST['password'])) { // Adds variable to search with
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
                echo (string)mysqli_num_rows($stmt);    // TEST - Checking Length of string
            }
        }else{
            $to_site_info .= verify_reg();
        }
    }
    
    function verify_reg(){
        $to_print_string = "";
        // Check Username
        if($_POST['username'] != ''){
                // Check that Username is NOT longer than 30 characters
            if (strlen($_POST['username'])>30){
                $to_print_string .= "ERROR - Username must <b>not</b> be longer than 30 characters.<br>You entered " . strlen($_POST['username']) .
                                        " characters.<br>";
                return $to_print_string; // ERROR RETURN
            }
                // Check that Username has ONLY numbers and letters - ASCII 48-57 NUMBERS, 65-90 UPPERCASE, 97-122 LOWERCASE
            for($i=0; $i<strlen($_POST['username']); $i++){
                $temp = 0;
                for($a=48; $a<=57; $a++){ 		// Checking all NUMBERS
                    if(ord(substr($_POST['username'], $i, 1)) != $a){
                        $temp++;
                    }
                }
                    for($a=65; $a<=90; $a++){ 		// Checking all UPPERCASE
                        if(ord(substr($_POST['username'], $i, 1)) != $a){
                            $temp++;
                        }
                    }
                    for($a=97; $a<=122; $a++){		// Checking all LOWERCASE
                        if(ord(substr($_POST['username'], $i, 1)) != $a){
                            $temp++;
                        }
                    }
                if($temp==62){				// Verifying temp is 62 - If not, then character was not within valid parameters
                    $to_print_string .= "ERROR - Username <b>must</b> contain only numbers and letters.<br>Character number " . ($i + 1) .
                                            " is '" . substr($_POST['username'], $i, 1) . "', which is NOT a number or a letter.<br>";
                    return $to_print_string; // ERROR RETURN
                }
            }
        }else{
            $to_print_string .= "ERROR - Username is REQUIRED!";
            return $to_print_string; // ERROR RETURN
        }
        // Check Username
        if($_POST['password'] != ''){
                // Check that Password is BETWEEN 6 and 30 characters
            if ((strlen($_POST['password'])<6) || (strlen($_POST['password'])>30)){
                $to_print_string .= "ERROR - Password must be <b>between</b> 6 and 30 characters.<br>You entered " . strlen($_POST['password']) .
                                        " characters.<br>";
                return $to_print_string; // ERROR RETURN
            }
                // Check that Password has NO spaces - ASCII 32 SPACE
            for($i=0; $i<strlen($_POST['password']); $i++){
                $temp = 0;
                if(ord(substr($_POST['password'], $i, 1)) == 32){	// Checking for SPACES
		    $temp++;
		}
                if($temp==1){				// Verifying temp is 1 - If not, then character was not within valid parameters
                    $to_print_string .= "ERROR - Password <b>must</b> contain only numbers, letters and symbols.<br>You entered a space, which is not allowed.<br>";
                    return $to_print_string; // ERROR RETURN
                }
            }
        }else{
            $to_print_string .= "ERROR - Password is REQUIRED!";
            return $to_print_string; // ERROR RETURN
        }
        return "SUCCESS"; // SUCCESS - Valid Info
    }