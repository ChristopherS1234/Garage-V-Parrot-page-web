<?php
session_start();
if (!$_SESSION['pass1']) {
    header('Location: admin-space.php');
}

?>

<?php include('includes/header.php'); ?>



<?php include('includes/footer.php'); ?>