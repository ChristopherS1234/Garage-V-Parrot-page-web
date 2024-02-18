<?php
session_start();
if (isset($_POST['confirm'])) {
    if (!empty($_POST['nom2']) and !empty($_POST['pass2'])) {
        $default_name = "employee@gmail.com";
        $default_pass = "employee1234";

        $nom_saisi = htmlspecialchars($_POST['nom2']);
        $pass_saisi = htmlspecialchars($_POST['pass2']);

        if ($nom_saisi == $default_name and $pass_saisi == $default_pass) {
            $_SESSION['pass2'] = $pass_saisi;
            header('Location: admin/page-employe.php');
        } else {
            echo "Mot de passe ou Email incorrect";
        }
    } else {
        echo "Veullez compléter tous les champs";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Administrateur</title>
    <link rel="stylesheet" href="site.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <section class="container-2 min-vh-100 d-flex justify-content-center align-items-center">
        <form action="" method="POST">
            <div class="form-group col">
                <label for="nom2" class="label-color">Email</label>
                <input type="mail" class="form-control" name="nom2" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="pass2" class="label-color">Mot de Passe</label>
                <input type="password" class="form-control" name="pass2" placeholder="Mot de Passe" required>
            </div>
            <div>
                <input type="submit" value="Confirmer" name="confirm">
            </div>
        </form>
    </section>
</body>

</html>