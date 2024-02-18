<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Parametre du Site</h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>


                <form action="employee-data.php" method="post">

                    <?php
                    $setting = getById('settings',1);

                    ?>

                    <input type="hidden" name="settingId" value="<?= $setting['data']['id'] ?? 'insert'?>" />


                    <div class="mb-3">
                        <label>Titre</label>
                        <input type="text" name="titre" class="form-control" value="<?= $setting['data']['titre'] ?? ""?>">
                    </div>
                    <div class="mb-3">
                        <label>URL/DOMAIN</label>
                        <input type="text" name="slug" class="form-control" value="<?= $setting['data']['slug'] ?? ""?>">
                    </div>
                    <div class="mb-3">
                        <label> Contact Description</label>
                        <input type="text" name="small_description" class="form-control" value="<?= $setting['data']['small_description'] ?? ""?>">
                    </div>

                    <h4 class="my-3"> Mise en page</h4>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea type="text" name="meta_description" class="form-control" rows="3"><?= $setting['data']['meta_description'] ?? ""?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Horaire</label>
                        <textarea type="text" name="meta_keyword" class="form-control" rows="3"><?= $setting['data']['meta_keyword'] ?? ""?></textarea>
                    </div>

                    <h4 class="my-3">Contact Information</h4>
                    <div class="row">


                        <div class="col-md-6 mb-3">
                            <label>Email 1</label>
                            <input type="email" name="email1" class="form-control" value="<?= $setting['data']['email1'] ?? ""?>" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email 2</label>
                            <input type="email" name="email2" class="form-control" value="<?= $setting['data']['email2'] ?? ""?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Téléphone 1</label>
                            <input type="text" name="phone1" class="form-control" value="<?= $setting['data']['phone1'] ?? ""?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Téléphone 2</label>
                            <input type="text" name="phone2" class="form-control" value="<?= $setting['data']['phone2'] ?? ""?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Address</label>
                            <textarea type="address" name="address" class="form-control" rows="3"><?= $setting['data']['address'] ?? ""?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 text-end">
                        <button type="submit" name="saveSetting" class="btn btn-danger">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include('includes/footer.php'); ?>