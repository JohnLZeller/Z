<?php
// ===============================================================
// * Filename: connect.php
// * Author: John Zeller
// * Date Created: December 5, 2012
// * Recently Updated: December 6, 2012
// * ------
// * Notes:
// * 
// * =============================================================

    function connect(){
        $mysqli = new mysqli("oniddb.cws.oregonstate.edu", "zellerjo-db", "RQXKvRU7D3W0x7bO", "zellerjo-db");
        if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "<br>";
        }
        return $mysqli;
    }
?>