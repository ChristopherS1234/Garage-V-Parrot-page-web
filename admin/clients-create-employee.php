<?php include('includes-employee/header-employee.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Client Ajouté
                    <a href="clients-employee.php" class="btn btn-danger float-end">Retour</a>
                </h4>
            </div>
            <div class="card-body">

                    <?= alertMessage(); ?>

                <form action="client-data-employee.php" method="post">
                    <div class="mb-3">
                        <label for="Name">Noms</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="mail">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phone">Téléphone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pass">Mot de passe</label>
                        <input type="password" name="pass" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="role">Role</label>
                        <select name="role" class="form-control">
                            <option value="">Séléction de Role</option>
                            <option value="reparation">Réparation</option>
                            <option value="achat">Achat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Séléction de role</label>
                        <br>
                        <input type="checkbox" name="is_ban" style="width: 30px;height: 30px">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="saveUser" class="btn btn-danger">Sauvegarder</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include('includes-employee/footer-employee.php'); ?>