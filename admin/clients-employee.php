<?php include('includes-employee/header-employee.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Liste des Clients
                    <a href="clients-create-employee.php" class="btn btn-danger float-end">Ajouter un Client</a>
                </h4>
            </div>
            <div class="card-body">

                <? alertMessage(); ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Noms</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Role</th>
                            <th>Ban</th>
                            <th>Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $users = getAll('client');
                        if (mysqli_num_rows($users) > 0) {

                            foreach ($users as $userItem) {

                        ?>
                                <tr>
                                    <td><?= $userItem['id']; ?></td>
                                    <td><?= $userItem['name']; ?></td>
                                    <td><?= $userItem['email']; ?></td>
                                    <td><?= $userItem['phone']; ?></td>
                                    <td><?= $userItem['role']; ?></td>
                                    <td><?= $userItem['is_ban'] == 1 ? 'Banni' : 'Active'; ?></td>
                                    <td>
                                        <a href="clients-edit-employee.php?id=<?= $userItem['id']; ?>" class="btn btn-success btn-sm">Changer</a>
                                        <a href="clients-delete-employee.php?id=<?= $userItem['id']; ?>" class="btn btn-primary btn-sm mx-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette personne ?')">Supprimer</a>
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

<?php include('includes-employee/footer-employee.php'); ?>