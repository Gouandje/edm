<?= $this->extend('backend/layout');?>
<?= $this->section('content');?>
    <div class="card shadow-sm">
        <div class="card-body">
            <form id="auditoraddform" class="clo-xl-12 col-lg-12  col-md-12" enctype="multipart/form-data">
                <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <input name="nom_prenom" type="text" class="form-control" placeholder="Nom et prénoms">
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="adresse" type="text" class="form-control" placeholder="Adresse e-mail">
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="telephone" type="text" class="form-control" placeholder="N°téléphone">
                    </div>
                    <br>
                    <div class="file-button">
                        <input type="file" name="image" class="form-control">
                    </div> 
                    <br>      
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <select name="niveau_id" class="form-control">
                            <option value="" selected="" disabled="">Selectionner le niveau</option>
                            <?php foreach($niveaux as $niveau): ?>
                                <option value="<?= $niveau['id']; ?>"><?= esc($niveau['name'])?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <select name="genre" class="form-control">
                            <option value="" selected="" disabled="">Selectionner le genre</option>
                            <option value="Masculin">Masculin</option>
                            <option value="Feminin">Feminin</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="login" placeholder="login: email ou telephone">
                    </div>
                    <br>

                    <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="votre mot de passe">
                    </div>
                    <br>

                    <div class="form-group">
                        <input name="confarmpassword" type="password" class="form-control" placeholder="Confirmation mot de passe">
                    </div>
                    <br>
                </div>
                    </div>
                </div>
                
                <br>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    
                    </div>
        
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Enregistrer</button>
                    </div>
                

                </div>
            </form>
        </div>
    </div>
<?= $this->endSection();?>   