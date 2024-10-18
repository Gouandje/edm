<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue Au centre de transformation des familles</title>
    <link href="https://fonts.googleapis.com/css2?family=Croissant+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: url('assets/home/back-08.png') no-repeat center center fixed;
            background-size: cover;
        }
        .footer {
            text-align: center;
            color: white;
        }
        .footer .title {
            font-size: 30px;
            letter-spacing: 0.5em;
            margin-bottom: 6px;
        }
        .footer .gold-line {
            width: 100%;
            height: 3px;
            background-color: gold;
            margin: 20px auto;
        }
        .footer .keywords {
            font-size: 1.2em;
            letter-spacing: 0.4em;
        }
        .footer .image-container img {
            max-width: 100%;
            height: auto;
        }
        .logo {
            margin: 20px 0;
            width: 100%;
            text-align: center;
        }
        .logo img {
            max-width: 100%;
            height: 140px;
            margin-top: 70px;
            margin-bottom: 20px;
        }
        #slider {
            width: 100%;
            position: relative;
            flex: 1;
        }
        .podiumcover {
            position: absolute;
            z-index: 1;
            left: 0;
            right: 0;
            margin: auto;
            width: 445px;
            height: 138%;
            top: 0;
            bottom: 0;
        }
        #slider .owl-carousel .owl-item .box {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 270px;
            height: 300px;
            margin: 0 auto;
            border-radius: 30px;
            background-color: #2f2f2f;
            text-align: center;
            font-size: 24px;
            font-family: 'Helvetica';
            color: #000;
            position: relative;
            z-index: 2;
            margin-top: 25px;
        }
        .slider-carousel {
            position: relative;
            top: 30px;
        }
        #slider.app-screens .owl-nav button {
            background: #000;
            border: 1px solid #000;
            color: #fff;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            position: absolute;
        }
        #slider .owl-nav button.owl-prev {
            left: 6%;
            top: 50%;
            transform: translateY(-50%);
        }
        #slider .owl-nav button.owl-next {
            right: 6%;
            top: 50%;
            transform: translateY(-50%);
        }
        #slider .active {
            transform: scale(.8);
            transition: .6s ease;
        }
        #slider .active.center {
            transform: scale(1);
        }
        #slider.app-screens .owl-nav button span {
            font-size: 40px;
            line-height: 4px;
            height: 10px;
            display: block;
        }
        .footer p {
            margin: 0;
            padding: 0;
        }
        @media (max-width: 992px) {
            .podiumcover {
                width: 30%;
            }
            #slider .owl-carousel .owl-item .box {
                width: 80%;
                height: auto;
                line-height: normal;
            }
        }
        @media (max-width: 600px) {
            .podiumcover {
                width: 55%;
            }
            #slider .owl-carousel .owl-item .box {
                width: 50%;
                height: auto;
                line-height: normal;
            }
        }
        @media (max-width: 600px) {
            .footer .title {
                font-size: 15px; /* Redimensionnez la taille du titre pour les appareils mobiles */
            }
            .footer .keywords {
                font-size: 13px; /* Redimensionnez la taille du titre pour les appareils mobiles */
            }
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="assets/home/logoCTF-05.png" alt="Logo">
    </div>
    <div id="slider" class="app-screens">
        <div class="slider-carousel">
            <img src="assets/home/podium-07.png" class="podiumcover" />
            <div class="owl-carousel slideslider">
                <div class="item">
                    <div class="box">
                        <a href="<?= base_url()?>"><img src="assets/home/edss-05.png" alt="STAF"></a>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <a href="<?= base_url()?>"><img src="assets/home/eds-05.png" alt="STAF"></a>
                    </div>
                </div>
                <div class="item">
                    <div class="box" style="background-color: rgb(156, 151, 151);">
                        <a href="<?= base_url()?>"><img src="assets/home/logo_home-05.png" alt="STAF"></a>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <a href="<?= base_url()?>login"><img src="assets/home/edm1-05.png" alt="EDM-1"></a>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <a href="<?= base_url()?>login"><img src="assets/home/edm2-05.png" alt="EDM-2"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" style="padding-top: 135px; padding-bottom: 46px;">
        <!--<div class="title" style="font-family: 'Helvetica';">CENTRE DE TRANSFORMATION DES FAMILLES</div>
        <div class="gold-line"></div>
        <div class="keywords" style="font-family: 'Helvetica';">ADORATION - TRANSFORMATION - GUÉRISON - FAMILLES - EXCELLENCE</div>-->
        <div class="image-container">
            <img src="assets/home/footer.png" alt="Footer Image">
        </div>
    </div>
    <!--<div class="footer">
    </div>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $('.slideslider').owlCarousel({
            center: true,
            nav: true,
            startPosition: 2, // Définir la position de départ sur le deuxième élément (index 1)
            margin: 10, // Ajouter une marge de 10px entre les items
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                },
                1366: {
                    items: 3
                }
            }
        });
    </script>
</body>
</html>
