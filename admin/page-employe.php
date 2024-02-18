<?php
session_start();
if (!$_SESSION['pass2']) {
    header('Location: employee-space.php');
}

?>

<?php include('includes-employee/header-employee.php'); ?>



<?php include('includes-employee/footer-employee.php'); ?>