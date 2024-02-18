<?php
session_start();
if (isset($_POST['confirm'])) {
    if (!empty($_POST['nom1']) and !empty($_POST['pass1'])) {
        $default_name = "adminparrot@gmail.com";
        $default_pass = "parrotgarage456";

        $nom_saisi = htmlspecialchars($_POST['nom1']);
        $pass_saisi = htmlspecialchars($_POST['pass1']);

        if ($nom_saisi == $default_name and $pass_saisi == $default_pass) {
            $_SESSION['pass1'] = $pass_saisi;
            header('Location: admin/administration.php');
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
    <section class="container-3 min-vh-100 d-flex justify-content-center align-items-center">
        <form action="" method="POST">
            <div class="form-group col">
                <label for="nom1" class="label-color">Email</label>
                <input type="mail" class="form-control" name="nom1" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="pass1" class="label-color">Mot de Passe</label>
                <input type="password" class="form-control" name="pass1" placeholder="Mot de Passe" required>
            </div>
            <div>
                <input type="submit" value="Confirmer" name="confirm">
            </div>
        </form>
    </section>
</body>

</html>