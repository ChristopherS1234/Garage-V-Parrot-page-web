<?php
require '../config/function.php';


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
            redirect('clients-employee.php','Employé Ajouté');

        }else{
            redirect('clients-create-employee.php','Une erreur est survenue.');
        }

    }else{
        redirect('clients-create-employee.php','Veuillez remplir tout le formulaire');
    }
}

if (isset($_POST['updateUser'])) {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $pass = validate($_POST['pass']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    $userID = validate($_POST['userId']);
    $users = getById('client', $userID);
    if ($users['status'] != 200) {
        redirect('clients-edit.php?id='.$userID,'Id inexistant');
    }

    if ($name != '' || $email != '' || $phone != '' || $pass != '') {

        $query = "UPDATE client SET name='$name',
                  email='$email',
                  phone='$phone',
                  pass='$pass',
                  role='$role',
                  is_ban='$is_ban'
                  WHERE id='$userID' ";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('clients-employee.php', 'Employé Modifié');
        } else {
            redirect('clients-edit-employee.php', 'Une erreur est survenue.');
        }
    } else {
        redirect('clients-edit-employee.php', 'Veuillez remplir tout le formulaire');
    }
}



?>