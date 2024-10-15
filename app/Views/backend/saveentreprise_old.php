<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importer une image et Nom d'entreprise</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
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

                <!-- Message PHP pour afficher le résultat de l'upload -->
                <div class="mt-3">
                    <?php
                    if (isset($_POST['submit'])) {
                        $nom_entreprise = $_POST['nom_entreprise'];
                        $image = $_FILES['image'];

                        // Taille maximale en octets (2 Mo)
                        $tailleMax = 2 * 1024 * 1024;

                        // Vérifier si le nom de l'entreprise est bien rempli
                        if (!empty($nom_entreprise)) {
                            // Vérifier si l'image a bien été téléchargée et si elle respecte la taille maximale
                            if ($image['size'] > $tailleMax) {
                                echo "<div class='alert alert-danger'>L'image dépasse la taille maximale autorisée de 2 Mo.</div>";
                            } else {
                                // Dossier de destination pour les images
                                $uploadDir = "upload_success/";
                                if (!is_dir($uploadDir)) {
                                    mkdir($uploadDir, 0777, true);
                                }

                                // Chemin du fichier uploadé
                                $uploadFile = $uploadDir . basename($image['name']);
                                $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

                                // Vérifier si l'image est bien un fichier valide
                                $check = getimagesize($image["tmp_name"]);
                                if ($check !== false) {
                                    // Vérifier les extensions autorisées
                                    $extensionsAutorisees = ['jpg', 'jpeg', 'png', 'gif'];
                                    if (in_array($imageFileType, $extensionsAutorisees)) {
                                        // Upload du fichier
                                        if (move_uploaded_file($image["tmp_name"], $uploadFile)) {
                                            echo "<div class='alert alert-success'>
                                                    L'image a été téléchargée avec succès pour l'entreprise <strong>$nom_entreprise</strong> : 
                                                    <a href='$uploadFile' target='_blank'>Voir l'image</a>
                                                  </div>";
                                        } else {
                                            echo "<div class='alert alert-danger'>Une erreur est survenue lors du téléchargement de l'image.</div>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-warning'>Seules les images JPG, JPEG, PNG et GIF sont autorisées.</div>";
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>Le fichier n'est pas une image valide.</div>";
                                }
                            }
                        } else {
                            echo "<div class='alert alert-warning'>Veuillez entrer le nom de l'entreprise.</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Lien vers Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
