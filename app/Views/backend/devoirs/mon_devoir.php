<?= $this->extend('backend/layout'); ?>
<?= $this->section('content'); ?>

<!-- <div class="container"> -->
    <div class="container py-4 shadow">        
     <h2 class="form-title text-center mb-4" style="color: #333; font-weight: bold;">Évaluation de <?= esc($auditor['nom_prenom']); ?></h2>
        <?php 
            $session = session(); 
        ?>
        <?php 
            $encrypter = \Config\Services::encrypter();
            $encryptedUserId = bin2hex($encrypter->encrypt($session->get('id')));
        ?>
        <div class="col-md-12">
            <form id="devoirForm">
            <input type="hidden" name="iduser" value="<?= $encryptedUserId; ?>">
                <div class="row">
                    <input type="hidden" name="user_id" value="<?= esc($auditor['user_id']); ?>">

                    <?php foreach($questions as $index => $question): ?>
                        <?php 
                            $encrypter = \Config\Services::encrypter();
                            $encryptedId = bin2hex($encrypter->encrypt($question['id']));
                        ?>

                        <!-- Début d'une nouvelle ligne pour les champs pairs (sauf checkbox) -->
                        <?php if($index % 2 === 0 && $question['question_type'] !== 'checkbox'): ?>
                            <div class="row">
                        <?php endif; ?>

                        <!-- Gestion du type checkbox -->
                        <?php if($question['question_type'] === 'checkbox'): ?>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="question_<?= esc($question['id']); ?>" name="question_<?= esc($question['id']); ?>">
                                        <label style="font-size: 15px;" class="form-check-label" for="question_<?= esc($question['id']); ?>">
                                            <?= esc($question['question']); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        <!-- Gestion des autres types de champs -->
                        <?php else: ?>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="question_<?= esc($question['id']); ?>"><?= esc($question['question']); ?></label>
                                    <?php if($question['question_type'] == 'textarea') { ?>
                                        <<?= $question['question_type'];?> class="form-control" id="question_<?= esc($question['id']); ?>" name="question_<?= esc($question['id']); ?>"></<?= $question['question_type'];?>>
                                    <?php } else { ?>
                                        <input class="form-control" id="question_<?= esc($question['id']); ?>" type="<?= esc($question['question_type']); ?>" name="question_<?= esc($question['id']); ?>">
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Fermeture de la ligne après chaque deuxième champ (sauf checkbox) -->
                        <?php if($index % 2 === 1 && $question['question_type'] !== 'checkbox'): ?>
                            </div>
                        <?php endif; ?>

                    <?php endforeach; ?>

                    <!-- Si le dernier champ est impair, fermer la rangée -->
                    <?php if(count($questions) % 2 !== 0): ?>
                        </div>
                    <?php endif; ?>

                    <!-- Bouton Envoyer -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding: 10px 30px; font-size: 1.1em; background-color: #007bff; border: none; border-radius: 5px;">Enregistrer</button>
                    </div>
                </div>


            </form>
        </div>
        

    </div> 
<!-- </div> -->

<?= $this->endSection(); ?>
