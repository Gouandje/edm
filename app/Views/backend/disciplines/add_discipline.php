<?= $this->extend('backend/layout');?>
<?= $this->section('content');?>
    <div class="card shadow-sm">
        <div class="card-body">
            <form id="addDisciplineForm" class="col-md-12 col-lg-12 col-xl-12" enctype="multipart/form-data">
                <!-- Champ pour le nom de l'entreprise -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la discipline :</label>
                    <input name="nom" type="text" class="form-control" placeholder="nom">
                </div>
                
                <!-- Champ pour télécharger une image -->
                <div class="mb-3">
                    <label for="coeficient" class="form-label">Coéfiscient:</label>
                    <input name="coeficient" type="number" class="form-control" placeholder="le coéficient">
                    </div>
                
                <!-- Bouton pour valider -->
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection();?>   