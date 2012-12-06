<!-- ===============================================================
 * Filename: registration.php
 * Author: John Zeller
 * Date Created: December 5, 2012
 * Recently Updated: December 5, 2012
 * ------
 * Notes:
 * 
 * =============================================================-->

<?php
    /* Check that inputs are good */
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
            echo "Thanks " . $_POST['fname'] . " " . $_POST['lname'] . "! Your account with username '" . $_POST['username'] . "' has been registered. ";
            echo "<br>";
            echo "Now please <a href='index.php'>click here</a> to login with your newly created account!";
        }