<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil - Topub</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .banner {
            background-image: url('img/1.jpg');
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .input-banner {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 5px;
        }
        .ad {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 200px;
            height: 500px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: none; /* Initially hidden */
            z-index: 9999;
        }
        .ad img {
            margin-top: 20px;
        }
        .ad.left {
            left: 0;
        }
        .ad.right {
            right: 0;
        }
        .ad-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-weight: bold;
            color: #000;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="ad left" id="left-ad">
    <span class="ad-close">&times;</span>
    <p>Espace Publicitaire</p>
    <img src="https://via.placeholder.com/180x250" alt="Bannière Publicitaire Gauche" class="img-fluid">
</div>

<div class="banner">
    <div class="input-banner">
        <!--<h1>Bienvenue sur Topub !</h1>-->
        <!--<input type="text" class="form-control" placeholder="Recherche...">-->
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <?php
        // Tableau d'images locales pour les produits
        $images = [
            'BatEn.jpg', 'produit2.jpg', 'produit3.jpg', 'produit4.jpg',
            'produit5.jpg', 'produit6.jpg', 'produit7.jpg', 'produit8.jpg',
            'produit9.jpg', 'produit10.jpg', 'produit11.jpg', 'produit12.jpg'
        ];
        for ($i = 0; $i < 12; $i++): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <!-- Utilisation d'images locales -->
                <img src="img/<?= $images[$i] ?>" class="card-img-top" alt="Image du Produit <?= $i + 1 ?>">
                <div class="card-body">
                    <h5 class="card-title">Entreprise <?= $i + 1 ?></h5>
                    <!--<p class="card-text">Prix: <?= rand(10, 100) ?> €</p>-->
                    <a href="<?= base_url(); ?>entreprise" class="btn btn-primary">Voir l'entreprise</a>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>

<div class="ad right" id="right-ad">
    <span class="ad-close">&times;</span>
    <p>Espace Publicitaire</p>
    <img src="https://via.placeholder.com/180x250" alt="Bannière Publicitaire Droite" class="img-fluid">
</div>

<footer>
    <div class="container">
        <p>&copy; <?= date('Y') ?> Topub. Tous droits réservés.</p>
        <p><a href="#">Politique de confidentialité</a> | <a href="#">Conditions d'utilisation</a></p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    const leftAd = document.getElementById('left-ad');
    const rightAd = document.getElementById('right-ad');

    function showAds() {
        leftAd.style.display = 'block';
        rightAd.style.display = 'block';
    }

    function hideAds() {
        leftAd.style.display = 'none';
        rightAd.style.display = 'none';
    }

    document.querySelectorAll('.ad-close').forEach(function(btn) {
        btn.addEventListener('click', function() {
            hideAds();
            setTimeout(showAds, 10 * 1000); // 10 secondes
        });
    });

    // Initial display of ads
    setTimeout(showAds, 100); // Show ads after 1 second for demo
</script>
</body>
</html>
