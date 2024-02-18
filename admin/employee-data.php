<?php
require '../config/function.php';


if (isset($_POST['saveUser'])) {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $pass = validate($_POST['pass']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    if ($name != '' || $email != '' || $phone != '' || $pass != '') {

        $query = "INSERT INTO employee (name,email,phone,pass,role,is_ban) VALUE ('$name','$email','$phone','$pass','$role','$is_ban')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users.php', 'Employé Ajouté');
        } else {
            redirect('users-create.php', 'Une erreur est survenue.');
        }
    } else {
        redirect('users-create.php', 'Veuillez remplir tout le formulaire');
    }
}

if (isset($_POST['updateUser'])) {
    $name = validate($_POST['Name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $pass = validate($_POST['pass']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    $userID = validate($_POST['userId']);
    $users = getById('employee', $userID);
    if ($users['status'] != 200) {
        redirect('users-edit.php?id=' . $userID, 'Id inexistant');
    }

    if ($name != '' || $email != '' || $phone != '' || $pass != '') {

        $query = "UPDATE employee SET name='$name',
                  email='$email',
                  phone='$phone',
                  pass='$pass',
                  role='$role',
                  is_ban='$is_ban'
                  WHERE id='$userID' ";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users.php', 'Employé Modifié');
        } else {
            redirect('users-edit.php', 'Une erreur est survenue.');
        }
    } else {
        redirect('users-edit.php', 'Veuillez remplir tout le formulaire');
    }
}

if (isset($_POST['saveSetting'])) {

    $titre = validate($_POST['titre']);
    $slug = validate($_POST['slug']);
    $small_description = validate($_POST['small_description']);

    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);
    $address = validate($_POST['address']);

    $settingId = validate($_POST['settingId']);

    if ($settingId == 'insert') {

        $query = "INSERT INTO settings (titre, slug, small_description, meta_description, meta_keyword, email1, email2, phone1, phone2, address)
        VALUES ('$titre', '$slug', '$small_description', '$meta_description', '$meta_keyword', '$email1', '$email2', '$phone1', '$phone2', '$address')";
        $result = mysqli_query($conn, $query);
    }

    if (is_numeric($settingId)) {
        $query = "UPDATE settings SET 
        titre= '$titre',
        slug='$slug', 
        small_description='$small_description', 
        meta_description='$meta_description', 
        meta_keyword='$meta_keyword', 
        email1='$email1', 
        email2='$email2', 
        phone1='$phone1', 
        phone2='$phone2', 
        address='$address'
        WHERE id='$settingId'

        ";
        $result = mysqli_query($conn, $query);
    }

    if ($result) {
        redirect('setting.php', 'Sauvegardé');
    } else {
        redirect('setting.php', 'Une erreur est survenue.');
    }
}

if (isset($_POST['saveSell'])) {


    $name = validate($_POST['name']);    
    $small_description = validate($_POST['small_description']);
    $long_description = validate($_POST['long_description']);


    if ($_FILES['image']['size'] > 0) {

        $image = $_FILES['image']['name'];

        $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if ($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes != 'png') {
            redirect('vente.php', 'Seulement les images JPG, JPEG, PNG sont accepté');
        }

        $path = "./img/";
        $imgExt = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $imgExt;

    $finalImage = './img/' . $filename;
    } else {
        $finalImage = NULL;
    }

    $slug = str_replace(' ', '-', strtolower($name));

    $query = "INSERT INTO ventes (name, small_description, long_description, image, slug) VALUES ('$name','$small_description', '$long_description', '$finalImage', '$slug')";

    $result = mysqli_query($conn, $query);
    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.$filename);
        redirect('vente.php', 'Vente Ajouté');
    } else {
        redirect('vente.php', 'Une errur est survenue.');
    }
}

if (isset($_POST['updateUser'])) {
    $name = validate($_POST['Name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $pass = validate($_POST['pass']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    $userID = validate($_POST['userId']);
    $users = getById('employee', $userID);
    if ($users['status'] != 200) {
        redirect('users-edit.php?id=' . $userID, 'Id inexistant');
    }

    if ($name != '' || $email != '' || $phone != '' || $pass != '') {

        $query = "UPDATE employee SET name='$name',
                  email='$email',
                  phone='$phone',
                  pass='$pass',
                  role='$role',
                  is_ban='$is_ban'
                  WHERE id='$userID' ";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users.php', 'Employé Modifié');
        } else {
            redirect('users-edit.php', 'Une erreur est survenue.');
        }
    } else {
        redirect('users-edit.php', 'Veuillez remplir tout le formulaire');
    }
}

if(isset($_POST['updateSell'])){

    $venteId = validate($_POST['venteId']); 
    $name = validate($_POST['name']); 

    $name = validate($_POST['name']);    
    $small_description = validate($_POST['small_description']);
    $long_description = validate($_POST['long_description']);

    $ventes = getById('ventes', $venteId);


    if ($_FILES['image']['size'] > 0) {

        $image = $_FILES['image']['name'];

        $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if ($imgFileTypes != 'jpg' && $imgFileTypes != 'jpeg' && $imgFileTypes != 'png') {
            redirect('vente.php', 'Seulement les images JPG, JPEG, PNG sont accepté');
        }


        $path = "./img/";

        $deleteImage = "../".$service['data']['image'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);

        }

        $imgExt = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $imgExt;

    $finalImage = './img' . $filename;
    } else {
        $finalImage = $ventes ['data']['image'];
    }

    $slug = str_replace(' ', '-', strtolower($name));

    $query = "UPDATE ventes SET 
    name='$name',
    small_description='$small_description',
    long_description='$long_description',
    image='$finalImage',
    slug='$slug'
    WHERE id='$venteId'
    ";

    $result = mysqli_query($conn, $query);
    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.$filename);
        redirect('ventes-edit.php?id='.$venteId, 'Vente Modifié');
    } else {
        redirect('ventes-edit.php?id='.$venteId, 'Une errur est survenue.');
    }

}