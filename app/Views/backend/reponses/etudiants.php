<?= $this->extend('backend/layout');?>
<?= $this->section('content');?>

<div class="container py-4">
    <!-- Ligne contenant le bouton "Ajouter un étudiant" -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Liste des étudiants</h2>
        <!-- <a href="<?= base_url()?>ajout-de-auditeur" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter un étudiant
        </a> -->
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
                <div class="card-body d-flex">
                    <img src="<?= $avatar; ?>" alt="Photo de l'étudiant" class="img-fluid rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="student-info overflow-hidden">
                        <h5 class="card-title text-truncate mb-1"><?= esc($auditor->nom_prenom); ?></h5>
                        <p class="mb-0 text-truncate"><strong>Niv.:</strong><?= esc($auditor->name); ?></p>
                        <p class="text-truncate"><strong>Tél.:</strong><?= esc($auditor->telephone); ?></p>
                    </div>
                </div>
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

<style>
    .student-card {
        transition: transform 0.2s ease-in-out;
    }
    .student-card:hover {
        transform: translateY(-5px);
    }
    .student-info {
        max-height: 100%;
        overflow: hidden;
    }
    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    @media (max-width: 767px) {
        .student-card {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .student-card img {
            margin-bottom: 15px;
        }

        .student-info {
            text-align: center;
        }
    }
</style>

<?= $this->endSection();?>
