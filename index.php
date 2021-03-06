<!DOCTYPE HTML>

<!-- ===============================================================
 * Filename: index.php
 * Author: John Zeller
 * Date Created: December 5, 2012
 * Recently Updated: December 7, 2012
 * ------
 * Notes:
 * 
 * =============================================================-->

<?php
    ob_start();             // Avoids resending data on refresh
    include 'core/init.php';
    include 'includes/header.php';
    include 'includes/run_registration_login.php';
?>

<div id="content-left">
    <span id="user_info"></span>
</div>

<div id="content-right">
    <span id="site_info"><?php echo $to_site_info ?></span>
</div>

<?php include 'includes/footer.php'; ?>