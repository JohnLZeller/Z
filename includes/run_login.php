<?php
// ===============================================================
// * Filename: run_login.php
// * Author: John Zeller
// * Date Created: December 5, 2012
// * Recently Updated: December 5, 2012
// * ------
// * Notes:
// * 
// * =============================================================

    if($_POST['type'] != 'login'){
        /* Check that inputs are good */
        if( verify_reg() != 1 ){ // Checks to see if form was filled out correctly. Doesn't accept if not.
            $reg_status = 1;    // Default is FAIL, unless it is changed by completion of the SQL submission
            $mysqli = connect();
            if( !($stmt = $mysqli->prepare("SELECT username, password, fname, lname, dob, gender, email, hometown_city, 
                                            hometown_state, cur_city, cur_state, about FROM Person WHERE username=?") ) ) {
                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
            }
            if (!$stmt->bind_param("ssssssssssss", $_POST['username'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['dob'],
                                                    $_POST['gender'], $_POST['email'], $_POST['hometown_city'], $_POST['hometown_state'],
                                                    $_POST['cur_city'], $_POST['cur_state'], $_POST['about'])) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }else{
                $reg_status = 0; // SUCCESS
            }
            if (!$stmt->bind_result($name, $awesome)){
                echo "Error binding result: (" . $stmt->errno . ") " . $stmt->error;
            }
            else {  // Print all the users info
                echo $username . ", " . $password . ", " . $fname . ", " . $lname . ", " . $dob . ", " . $gender . ", " . $email .
                echo ", " . $hometown_city . ", " . $hometown_state . ", " . $cur_city . ", " . $cur_state . ", " . $about
            }
        }else{
            echo "<script type='text/javascript'>alert('Form Information is incorrect!');</script>";
        }
    }
    
    function verify_reg(){
        return 0; // SUCCESS - Valid Info
    }