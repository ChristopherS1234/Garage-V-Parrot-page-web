<?php include('includes-employee/header-employee.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Vente Modifié
                    <a href="vente-employee.php" class="btn btn-danger float-end">Retour</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="vente-data-employee.php" method="post">
                    <?php

                    $paramResult = checkParamId('id');
                    if (!is_numeric($paramResult)) {
                        echo '<h5>'.$paramResult.'</h5>';
                        return false;
                    }

                    $ventes = getById('ventes', $paramResult);
                    if ($ventes['status'] == 200) {

                    ?>
                        <input type="hidden" name="venteId" value="<?= $ventes['data']['id']; ?>" required>


                        <div class="mb-3">
                            <label>Nom de la carte</label>
                            <input type="text" name="name" value="<?= $ventes['data']['name']; ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Description 1</label>
                            <input type="text" name="small_description" value="<?= $ventes['data']['small_description']; ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Description 2</label>
                            <input type="text" name="long_description" value="<?= $ventes['data']['long_description']; ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" required>
                            <img src="<?= './'.$ventes['data']['image'] ?>" style="width: 70px;height:70px;" alt="Img">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="updateSell" class="btn btn-danger">Modifier</button>
                        </div>


                    <?php

                    } else {
                        echo '<h5>' . $ventes['message'] . '</h5>';
                    }


                    ?>


                </form>

            </div>
        </div>
    </div>
</div>

<?php include('includes-employee/footer-employee.php'); ?>