<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Employé Changé
                    <a href="users.php" class="btn btn-danger float-end">Retour</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="employee-data.php" method="post">
                    <?php

                    $paramResult = checkParamId('id');
                    if (!is_numeric($paramResult)) {
                        echo '<h5>'.$paramResult.'</h5>';
                        return false;
                    }

                    $users = getById('employee', checkParamId('id'));
                    if ($users['status'] == 200) {

                    ?>
                        <input type="hidden" name="userId" value="<?= $users['data']['id']; ?>" required>


                        <div class="mb-3">
                            <label for="Name">Noms</label>
                            <input type="text" name="Name" value="<?= $users['data']['name']; ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?= $users['data']['email']; ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Téléphone</label>
                            <input type="text" name="phone" value="<?= $users['data']['phone']; ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass">Mot de passe</label>
                            <input type="password" name="pass" value="<?= $users['data']['pass']; ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="role">Role</label>
                            <select name="role" class="form-control">
                                <option value="">Séléction de Role</option>
                                <option value="vendeur" value="<?= $users['data']['role'] == 'vendeur' ? 'selected' : ''; ?>">Vendeur</option>
                                <option value="reparateur" value="<?= $users['data']['role'] == 'reparateur' ? 'selected' : ''; ?>">Réparateur</option>
                                <option value="rep-ven" value="<?= $users['data']['role'] == 'rep-ven' ? 'selected' : ''; ?>">Réparateur/Vendeur</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Ban</label>
                            <br>
                            <input type="checkbox" name="is_ban" value="<?= $users['data']['is_ban'] == true ? 'checked' : ''; ?>" style="width: 30px;height: 30px">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="updateUser" class="btn btn-danger">Changer</button>
                        </div>


                    <?php

                    } else {
                        echo '<h5>' . $users['message'] . '</h5>';
                    }


                    ?>


                </form>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>