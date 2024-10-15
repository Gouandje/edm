<?= $this->extend('backend/layout'); ?>
<?= $this->section('content'); ?>

<!-- Bouton "Ajouter une nouvelle discipline" en haut à droite de la page -->
<div class="d-flex justify-content-end mb-3">
    <a href="<?= base_url(); ?>ajout-de-discipline" class="btn btn-primary">
        <i class="fas fa-plus"></i> Ajouter une nouvelle discipline
    </a>
</div>

<!-- Contenu de la carte -->
<div class="card shadow-sm">
    <div class="card-body">
        <!-- Titre de la section -->
        <h5 class="card-title mb-4">Liste des Disciplines</h5>

        <!-- Table des disciplines -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th class="text-center">Coéficient</th>
                    <th>Statut</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($disciplines as $discipline): ?>
                    <?php 
                        $encrypter = \Config\Services::encrypter();
                        $encryptedId = bin2hex($encrypter->encrypt($discipline['id']));
                    ?>
                    <tr>
                        <td><?= esc($discipline['nom']) ?></td>
                        <td class="text-center"><?= esc($discipline['coeficient']) ?></td>
                        <td>
                            <button class="btn btn-primary"><?= esc($discipline['status']) ?></button>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('modification-discipline/'.$encryptedId); ?>" class="btn btn-primary">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="<?= base_url('supprime-discipline/'.$encryptedId); ?>" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
