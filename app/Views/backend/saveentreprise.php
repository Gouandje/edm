<?= $this->extend('backend/layout');?>
<?= $this->section('content');?>
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title text-center">Formulaire d'importation d'image et de nom d'entreprise</h4>
            <!-- Formulaire HTML -->
            <form action="<?= base_url('/form/saveEntreprise') ?>" method="post" enctype="multipart/form-data">
                <!-- Champ pour le nom de l'entreprise -->
                <div class="mb-3">
                    <label for="nom_entreprise" class="form-label">Nom de l'entreprise :</label>
                    <input type="text" name="nom_entreprise" id="nom_entreprise" class="form-control" required>
                </div>
                
                <!-- Champ pour télécharger une image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Sélectionnez une image (max. 2 Mo) :</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                </div>
                
                <!-- Bouton pour valider -->
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection();?>   