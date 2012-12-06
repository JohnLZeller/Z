<!DOCTYPE HTML>

<!-- ===============================================================
 * Filename: register.php
 * Author: John Zeller
 * Date Created: December 5, 2012
 * Recently Updated: December 5, 2012
 * ------
 * Notes:
 * 
 * =============================================================-->

<?php
    include 'core/init.php';
    include 'includes/header.php';
    include 'includes/registration.php';
?>

<div id="content-left">
    <form id="register_form" action="" method="post">
        <h2>Register Now</h2><br>
        Username<br>
        <input type="text" name="username"><br><br>
        Password<br>
        <input type="text" name="password"><br><br>
        First Name<br>
        <input type="text" name="fname"><br><br>
        Last Name<br>
        <input type="text" name="lname"><br><br>
        Birthday<br>
        <input type="date" name="dob"><br><br>
        Gender<br>
        <input type="radio" name="gender" value="male"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br><br>
        Email<br>
        <input type="email" name="email"><br><br><br>
        <input name="register_submit" type="submit" value="Register">
    </form>
</div>

<div id="content-right">
    
    
</div>

<?php include 'includes/footer.php'; ?>