<?php
require 'config/function.php';


if(isset($_POST['saveUser'])){
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $pass = validate($_POST['pass']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;

    if($name != '' || $email !='' ||$phone !='' ||$pass !=''){

        $query = "INSERT INTO client (name,email,phone,pass,role,is_ban) VALUE ('$name','$email','$phone','$pass','$role','$is_ban')";
        $result = mysqli_query($conn, $query);

        if ($result){
            redirect('formulaire.php','Client Ajouté');

        }else{
            redirect('formulaire.php','Une erreur est survenue.');
        }

    }else{
        redirect('formulaire.php','Veuillez remplir tout le formulaire');
    }
}