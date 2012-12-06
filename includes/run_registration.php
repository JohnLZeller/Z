<?php
// ===============================================================
// * Filename: run_registration.php
// * Author: John Zeller
// * Date Created: December 5, 2012
// * Recently Updated: December 5, 2012
// * ------
// * Notes:
// *    Currently, POST resends form data if you hit refresh after a successful form submission
//          Using header() is not working like it should be
// * =============================================================

    if($_POST['type'] != 'register'){
        /* Check that inputs are good */
        if( verify_reg() != 1 ){ // Checks to see if form was filled out correctly. Doesn't accept if not.
            $reg_status = 1;    // Default is FAIL, unless it is changed by completion of the SQL submission
            $mysqli = connect();
            if( !($stmt = $mysqli->prepare("INSERT INTO Person(username, password, fname, lname, dob, gender, email)" .
                                           "VALUES ('" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['fname'] . "', '" .
                                                         $_POST['lname'] . "', '" . $_POST['dob'] . "', '" . $_POST['gender'] . "', '" .
                                                         $_POST['email'] . "')") ) ) {
                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "<br>";
            }
            if (!$stmt->execute()){
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "<br>";
            }else{
                $reg_status = 0; // SUCCESS
            }
            if($reg_status == 0){
                header("Location: index.php?reg=0"); /* Redirect browser - Tried to pass a URL query, didn't work at first*/
            }
        }else{
            echo "<script type='text/javascript'>alert('Form Information is incorrect!');</script>";
        }
    }
    
    function verify_reg(){
        return 0; // SUCCESS - Valid Info
    }