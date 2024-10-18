<?= $this->extend('backend/layout'); ?>
<?= $this->section('content'); ?>
<?php $session = session(); ?>
<style>
    .card {
        border: none;
    }

    .card-body {
        padding: 30px;
    }

    img {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .nav-tabs .nav-link {
        font-weight: bold;
    }

    .nav-tabs .nav-link.active {
        color: #007bff;
        border-color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .form-control, .form-select {
        border-radius: 0;
        box-shadow: none;
    }

    .tab-pane {
        padding-top: 10px;
    }

</style>
<div class="container-fluid" style="padding-top: 80px;">
    <div class="row">
    <div class="col-md-4 mb-4">
        <div class="card bg-dark text-white shadow-sm border-0 rounded-lg">
            <!-- Card Header with profile image -->
            <div class="card-header text-center bg-dark border-bottom-0">
                <img src="<?= base_url(esc($session->get('avatar'))); ?>" class="rounded-circle mb-3 shadow-lg" alt="<?= esc($auditor['nom_prenom']); ?>" style="width: 150px; height: 150px; border: 3px solid #fff;">
            </div>

            <!-- Card Body with user information -->
            <div class="card-body">
                <!-- Nom et prénom -->
                <div class="row text-center">
                <div class="col-md-12">
                    <h4><?= esc($auditor['nom_prenom']); ?></h4>
                </div>
                <div class="col-md-12">
                    <h5><?= esc($auditor['name']); ?></h5>
                </div>
                <div class="col-md-12">
                    <h5><?= esc($auditor['telephone']); ?></h5>
                </div>
                <div class="col-md-12">
                <h5><?= esc($auditor['adresse']); ?></h5>

                </div>
                </div>
        
                
                <!-- Adresse -->
            </div>
        </div>
    </div>
        <!-- Right Side (Form) -->
        <div class="col-md-8">
            <?php 
                $encrypter = \Config\Services::encrypter();
                $encryptedId = bin2hex($encrypter->encrypt($session->get('id')));
            ?>
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="activities-tab" data-bs-toggle="tab" data-bs-target="#activities" type="button" role="tab">Mes Notes</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="update-info-tab" data-bs-toggle="tab" data-bs-target="#update-info" type="button" role="tab">Mettre À Jour Mes Informations</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="activities" role="tabpanel" aria-labelledby="activities-tab">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Semaine</th>
                                <th>Note</th>
                                <th>Observation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($notes as $note): ?>
                            <tr>
                                <td><?= esc($note['week']); ?></td>
                                <td><?= esc($note['note']); ?></td>
                                <td></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="update-info" role="tabpanel" aria-labelledby="update-info-tab">
                    <form id="byauditoreditform" enctype="multipart/form-data" method="post" action="<?= base_url('profile/update'); ?>">
                    <input type="hidden" name="usrid" value="<?= $encryptedId?>">

                    <div class="row">
                            <!-- Name and Gender -->
                            <div class="col-md-6 mb-3">
                                <input name="nom_prenom" type="text" class="form-control" value="<?= esc($auditor['nom_prenom']); ?>" placeholder="Nom et Prénom">
                            </div>
                            <div class="col-md-6 mb-3">
                                <select name="genre" class="form-select">
                                    <option value="none" selected disabled>Selectionner le Genre</option>
                                    <option value="Masculin" <?= ($auditor['genre'] == 'Masculin') ? 'selected' : ''; ?>>Masculin</option>
                                    <option value="Féminin" <?= ($auditor['genre'] == 'Féminin') ? 'selected' : ''; ?>>Féminin</option>
                                </select>
                            </div>

                            <!-- Phone and Profile Image -->
                            <div class="col-md-6 mb-3">
                                <input type="text" name="telephone" class="form-control" value="<?= esc($auditor['telephone']); ?>" placeholder="Téléphone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="file" name="image" class="form-control" placeholder="Votre photo de profile">
                            </div>

                            <!-- Login and Address -->
                            <div class="col-md-6 mb-3">
                                <input type="text" name="login" class="form-control" value="<?= $session->get('login'); ?>" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="adresse" class="form-control" value="<?= esc($auditor['adresse']); ?>" placeholder="Adresse">
                            </div>

                            <!-- Password Fields -->
                            <div class="col-md-6 mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Nouveau mot de passe">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="password" name="confarmpassword" class="form-control" placeholder="Confirmer mot de passe">
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">Enregistrer les modifications</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
