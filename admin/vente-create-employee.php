<?php include('includes-employee/header-employee.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Vente Ajouté
                    <a href="vente-employee.php" class="btn btn-danger float-end">Retour</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <form action="vente-data-employee.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 mb-3">
                        <label>Nom de la carte</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Decription 1</label>
                        <textarea name="small_description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Description 2</label>
                        <textarea name="long_description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="saveSell" class="btn btn-danger">Sauvegarder</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include('includes-employee/footer-employee.php'); ?>