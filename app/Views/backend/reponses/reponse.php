<?= $this->extend('backend/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="form-container p-4 shadow-lg rounded" style="background-color: #FFFFFF; max-width: 800px; margin: auto;">
        <h2 class="form-title text-center mb-4" style="color: #333; font-weight: bold;">Évaluation de <?= esc($auditor['nom_prenom']); ?></h2>
        <form id="noteForm">
            <input type="hidden" name="user_id" value="<?= esc($auditor['user_id']); ?>">

            <?php
            // Regrouper les réponses par semaine
            $groupedResponses = [];
            foreach ($responses as $response) {
                $week = $response['week'];
                if (!isset($groupedResponses[$week])) {
                    $groupedResponses[$week] = [];
                }
                $groupedResponses[$week][] = $response;
            }

            // Trier les semaines par ordre croissant
            ksort($groupedResponses);
            ?>

            <!-- Onglets pour chaque semaine -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php $first = true; ?>
                <?php foreach ($groupedResponses as $week => $weekResponses): ?>
                <li class="nav-item">
                    <a class="nav-link <?= $first ? 'active' : ''; ?>" id="week-<?= esc($week); ?>-tab" data-bs-toggle="tab" href="#week-<?= esc($week); ?>" role="tab" aria-controls="week-<?= esc($week); ?>" aria-selected="<?= $first ? 'true' : 'false'; ?>">
                        <?= esc($week); ?>
                    </a>
                </li>
                <?php $first = false; ?>
                <?php endforeach; ?>
            </ul>

            <div class="tab-content" id="myTabContent">
                <?php $first = true; ?>
                <?php foreach ($groupedResponses as $week => $weekResponses): ?>
                <div class="tab-pane fade <?= $first ? 'show active' : ''; ?>" id="week-<?= esc($week); ?>" role="tabpanel" aria-labelledby="week-<?= esc($week); ?>-tab">
                    <div class="mt-3">
                        <?php foreach ($weekResponses as $response): ?>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: bold"><?= esc($response['question']); ?></label>
                            <p>
                                <?php 
                                if ($response['question_type'] == 'checkbox') {
                                    echo ($response['response'] == 'on') ? 'Oui' : 'Non';
                                } else {
                                    echo 'Réponse: ' . esc($response['response']);
                                }
                                ?>
                            </p>
                            <input type="hidden" name="week" value="<?= $response['week']; ?>">
                            <div class="mb-4">
                                <label class="form-label">Note:</label>
                                <div class="rating" style="gap: 10px;">
                                    <?php for ($i = 0; $i <= 10; $i++): ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="note_<?= esc($response['id']); ?>" id="note_<?= esc($response['id']); ?>_<?= $i; ?>" value="<?= $i; ?>">
                                            <label class="form-check-label" for="note_<?= esc($response['id']); ?>_<?= $i; ?>"><?= $i; ?></label>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                           </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php $first = false; ?>
                <?php endforeach; ?>
            </div>

            <!-- Bouton Envoyer -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg" style="padding: 10px 30px; font-size: 1.1em; background-color: #007bff; border: none; border-radius: 5px;">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<!-- <script>
    $('#noteForm').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: '<?= base_url()?>save-note',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Lobibox.notify('success', {
                        msg: response.message
                    });
                    window.location = "<?= base_url()?>reponses";
                } else {
                    Lobibox.notify('error', {
                        msg: response.message
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Lobibox.notify('error', {
                    title: 'Erreur de connexion au serveur',
                    msg: errorThrown
                });
            }
        });
    });
</script> -->

<?= $this->endSection(); ?>
