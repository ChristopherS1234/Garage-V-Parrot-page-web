<?php

use LDAP\Result;

require 'config/function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if (isset($pageTitle)) {
            echo $pageTitle;
          } else {
            echo webSetting('titre') ?? 'PageTitle';
          } ?></title>
  <meta name="description" content="<?= webSetting('meta_description') ?? 'Meta Desc'; ?>">
  <meta name="keyword" content="<?= webSetting('meta_keyword') ?? 'Meta Keyword'; ?>">
  <link rel="stylesheet" href="site.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <nav class="site-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><?= webSetting('titre') ?? 'WebPage'; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#down">Contacter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="employee-space.php">Employé</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-space.php">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="banner d-flex justify-content-center align-items-center pt-5">
    <div class="container my-5 py-5">
      <div class="row">
        <div class="col-md 6"></div>
        <div class="col-md 6">
          <h1 class="title">
            Nos Services
          </h1>
          <h2 class="summary"><?= webSetting('meta_description') ?? ''; ?></h2>
          <p>
            <button class="btn btn-dark">
              <a class="nav-link active" href="#down">Réparation</a></button>
            <button class="btn btn-dark">
              <a class="nav-link active" href="#top-middle">Vente d'occasion</a></button>
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="avilable d-flex justify-content-center align-items-center py-5" id="top-middle">

    <div class="container">
      <div class="row">
        <?php
        $venteQuery = "SELECT * FROM ventes WHERE id='1'";
        $result = mysqli_query($conn, $venteQuery);

        if ($result) {
          if (mysqli_num_rows($result) > 0) {

            foreach ($result as $row) {

        ?>
              <div class="col-md-3 mb-3">
                <div class="card my-5" style="width: 18rem;">
                  <?php if ($row['image'] != '') : ?>
                    <img src="<?= $row['image']; ?>" class="card-img-top img-fluid" alt="Img">
                  <?php else : ?>
                    <img src="./img/no-img.png" class="card-img-top img-fluid" alt="Img">
                  <?php endif; ?>
                  <div class="card-body">
                    <h5 class="card-title"><?= $row['name']; ?></h5>
                    <p class="card-text">
                      <?= $row['small_description']; ?>
                    </p>
                    <a href="#down" class="btn btn-primary">Contacter</a>
                  </div>
                </div>
              </div>
        <?php
            }
          } else {
            echo "<h5>Sans info</h5>";
          }
        } else {
          echo "<h5>Une erreur est survenue</h5>";
        }
        ?>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <?php
        $venteQuery = "SELECT * FROM ventes WHERE id='2'";
        $result = mysqli_query($conn, $venteQuery);

        if ($result) {
          if (mysqli_num_rows($result) > 0) {

            foreach ($result as $row) {

        ?>
              <div class="col-md-3 mb-3">
                <div class="card my-5" style="width: 18rem;">
                  <?php if ($row['image'] != '') : ?>
                    <img src="<?= $row['image']; ?>" class="card-img-top img-fluid" alt="Img">
                  <?php else : ?>
                    <img src="./img/no-img.png" class="card-img-top img-fluid" alt="Img">
                  <?php endif; ?>
                  <div class="card-body">
                    <h5 class="card-title"><?= $row['name']; ?></h5>
                    <p class="card-text">
                      <?= $row['small_description']; ?>
                    </p>
                    <a href="#down" class="btn btn-primary">Contacter</a>
                  </div>
                </div>
              </div>
        <?php
            }
          } else {
            echo "<h5>Sans info</h5>";
          }
        } else {
          echo "<h5>Une erreur est survenue</h5>";
        }
        ?>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <?php
        $venteQuery = "SELECT * FROM ventes WHERE id='3'";
        $result = mysqli_query($conn, $venteQuery);

        if ($result) {
          if (mysqli_num_rows($result) > 0) {

            foreach ($result as $row) {

        ?>
              <div class="col-md-3 mb-3">
                <div class="card my-5" style="width: 18rem;">
                  <?php if ($row['image'] != '') : ?>
                    <img src="<?= $row['image']; ?>" class="card-img-top img-fluid" alt="Img">
                  <?php else : ?>
                    <img src="./img/no-img.png" class="card-img-top img-fluid" alt="Img">
                  <?php endif; ?>
                  <div class="card-body">
                    <h5 class="card-title"><?= $row['name']; ?></h5>
                    <p class="card-text">
                      <?= $row['small_description']; ?>
                    </p>
                    <a href="#down" class="btn btn-primary">Contacter</a>
                  </div>
                </div>
              </div>
        <?php
            }
          } else {
            echo "<h5>Sans info</h5>";
          }
        } else {
          echo "<h5>Une erreur est survenue</h5>";
        }
        ?>
      </div>
    </div>

  </section>

  <section class="horaires d-flex justify-content-center align-items-center pt-5" id="down-middle">
    <div class="container my-5 py-5">
      <div class="row">
        <div class="col-md 6"></div>
        <div class="col-md 6">
          <h1 class="text-h">
            Horaires d'ouverture
          </h1>
          <h2 class="date"><?= webSetting('meta_keyword') ?? 'Horaire'; ?> <h2>

        </div>
      </div>
    </div>
  </section>

  <section class="container-1 min-vh-100 d-flex justify-content-center align-items-center" id="down">
    <form action="formulaire-client.php" method="post">
      <div class="mb-3">
        <label class="title" for="Name">Noms</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="mb-3">
        <label class="title" for="mail">Email</label>
        <input type="email" name="email" class="form-control">
      </div>
      <div class="mb-3">
        <label class="title" for="phone">Téléphone</label>
        <input type="text" name="phone" class="form-control">
      </div>
      <div class="mb-3">
        <label class="title" for="pass">Mot de passe</label>
        <input type="password" name="pass" class="form-control">
      </div>
      <div class="mb-3">
        <label class="title" for="role">Role</label>
        <select name="role" class="form-control">
          <option value="">Séléction de Role</option>
          <option value="reparation">Réparation</option>
          <option value="achat">Achat</option>
        </select>
      </div>
      <div class="mb-3">
        <button type="submit" name="saveUser" class="btn btn-danger">Sauvegarder</button>
      </div>
    </form>
  </section>

  <footer id="down">
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4 class="footer-heading"><?= webSetting('titre') ?? 'Titre Desc'; ?></h4>
            <hr>
            <p>
              <?= webSetting('small_description') ?? 'Small Desc'; ?>
            </p>
          </div>
          <div class="col-md-6">
            <h4 class="footer-heading">Contact Information </h4>
            <hr>
            <p>Address: <?= webSetting('address') ?? ''; ?></p>
            <p>Email: <?= webSetting('email1') ?? ''; ?>, <?= webSetting('email2') ?? 'Meta Desc'; ?></p>
            <p>Téléphone: <?= webSetting('phone1') ?? ''; ?>, <?= webSetting('phone2') ?? 'Meta Desc'; ?></p>
          </div>
        </div>
      </div>
  </footer>

</body>

</htm