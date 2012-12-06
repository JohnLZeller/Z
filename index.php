<!DOCTYPE HTML>

<!-- ===============================================================
 * Filename: index.php
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
?>

<div id="content-left">
    <form id="login_form" action="login.php" method="post">
        Username<br>
        <input type="text" name="username"><br><br>
        Password<br>
        <input type="text" name="password"><br><br><br>
        <input name="login_submit" type="submit" value="Log In">
    </form>
    <br>Are you a new user?<br>
    <a href="register.php">Register Here!</a>
</div>

<div id="content-right">
    
    
</div>

<?php include 'includes/footer.php'; ?>