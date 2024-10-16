<?= $this->extend('backend/layout');?>
<?= $this->section('content');?>

<div class="container py-4">
    <!-- Ligne contenant le bouton "Ajouter un étudiant" -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Liste des étudiants</h2>
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dateModal">
        <i class="fas fa-file-excel"></i> Exporter les notes
        </a>
    </div>

    <div class="row justify-content-center">
        <!-- Exemple de carte, à dupliquer avec différentes informations -->
        <?php if ($auditors): ?>
        <?php foreach($auditors as $auditor): ?>
            <?php 
                $encrypter = \Config\Services::encrypter();
                $encryptedId = bin2hex($encrypter->encrypt($auditor->id));
                // Si l'avatar n'existe pas, on utilise une image par défaut
                $avatar = !empty($auditor->avatar) ? base_url(esc($auditor->avatar)) : base_url('uploads/avatar_defaut.jpg');
            ?>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card student-card shadow-sm h-100">
                <a href="<?= base_url('responsesetudiant/'.$encryptedId)?>" class="student-card-link" style="cusor:pointer">
                    <span class="badge bg-danger notification-badge">1</span>
                    <div class="card-body d-flex">
                        <img src="<?= $avatar; ?>" alt="Photo de l'étudiant" class="img-fluid rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="student-info overflow-hidden">
                            <h5 class="card-title text-truncate mb-1"><?= esc($auditor->nom_prenom); ?></h5>
                            <p class="mb-0 text-truncate"><strong>Niv.:</strong><?= esc($auditor->name); ?></p>
                            <p class="text-truncate"><strong>Tél.:</strong><?= esc($auditor->telephone); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    Aucune information trouvée.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="dateModal" tabindex="-1" aria-labelledby="dateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dateModalLabel">Sélectionnez les dates</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="dateForm">
            <div class="modal-body">
            
                <div class="mb-4 datepicker-input-group">
                <label for="startDate" class="form-label">Date de début</label>
                <input type="date" class="form-control datepicker" id="startDate" placeholder="Choisissez la date de début">
                <i class="datepicker-icon bi bi-calendar"></i>
                </div>
                <div class="mb-4 datepicker-input-group">
                <label for="endDate" class="form-label">Date de fin</label>
                <input type="date" class="form-control datepicker" id="endDate" placeholder="Choisissez la date de fin">
                <i class="datepicker-icon bi bi-calendar"></i>
                </div>
                <div class="alert alert-danger d-none" id="dateError">
                La date de début doit être inférieure à la date de fin.
                </div>
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary" id="saveDates">Sauvegarder</button>
            </div>
        </form>
      </div>
    </div>
</div>

<?= $this->endSection();?>
