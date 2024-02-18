<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Liste des Ventes
                    <a href="vente-create.php" class="btn btn-danger float-end">Ajouter une Vente</a>
                </h4>
            </div>
            <div class="card-body">

                <? alertMessage(); ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom de la carte</th>
                            <th>Description</th>
                            <th>Description 2</th>
                            <th>Image</th>
                            <th>Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $users = getAll('ventes');
                        if (mysqli_num_rows($users) > 0) {

                            foreach ($users as $userItem) {

                        ?>
                                <tr>
                                    <td><?= $userItem['id']; ?></td>
                                    <td><?= $userItem['name']; ?></td>
                                    <td><?= $userItem['small_description']; ?></td>
                                    <td><?= $userItem['long_description']; ?></td>
                                    <td><?= $userItem['image']; ?></td>
                                    <td>
                                        <a href="ventes-edit.php?id=<?= $userItem['id']; ?>" class="btn btn-success btn-sm">Changer</a>
                                        <a href="ventes-delete.php?id=<?= $userItem['id']; ?>" class="btn btn-primary btn-sm mx-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette personne ?')">Supprimer</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7">No record found</td>
                            </tr>
                        <?php
                        }



                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>