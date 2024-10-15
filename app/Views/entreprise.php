<?php
// process.php intégré au début du fichier
$message_sent = false;
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecte et validation des données du formulaire
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        $error_message = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Adresse email invalide.";
    } else {
        // Protection contre les injections
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        // Configuration de l'email
        $to = "contact@entreprisebatiment.com"; // Remplacez par votre adresse email
        $subject = "Nouveau message de $name";
        $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email\r\n";

        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            $message_sent = true;
        } else {
            $error_message = "Erreur lors de l'envoi du message. Veuillez réessayer plus tard.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entreprise de Bâtiment XYZ</title>
    <meta name="description" content="Entreprise de Bâtiment XYZ - Votre partenaire de confiance pour tous vos travaux de construction et de rénovation.">
    <style>
        /* style.css intégré et optimisé */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-image: url('http://localhost:8888/topub/public/img/entreprises/1.jpg');
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }

        header h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        header p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e65b50;
        }

        section {
            padding: 50px 0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        #services .services-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .service {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .service img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .service h3 {
            margin-top: 0;
            color: #ff6f61;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form label {
            align-self: flex-start;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        form input, form textarea {
            width: 100%;
            max-width: 500px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #e65b50;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #services .services-grid {
                flex-direction: column;
                align-items: center;
            }

            .service {
                width: 80%;
            }

            header h1 {
                font-size: 2.5em;
            }

            header p {
                font-size: 1em;
            }
        }

        /* Additional Styles for Images */
        .about-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Bienvenue à l'Entreprise de Bâtiment XYZ</h1>
            <p>Votre partenaire de confiance pour tous vos travaux de construction et de rénovation.</p>
            <a href="#contact" class="btn">Contactez-nous</a>
        </div>
    </header>

    <section id="services">
        <div class="container">
            <h2>Nos Services</h2>
            <div class="services-grid">
                <div class="service">
                    <img src="http://localhost:8888/topub/public/img/entreprises/2.jpg" alt="Construction Résidentielle" loading="lazy">
                    <h3>Construction Résidentielle</h3>
                    <p>Nous réalisons des constructions de maisons sur mesure selon vos besoins.</p>
                </div>
                <div class="service">
                    <img src="http://localhost:8888/topub/public/img/entreprises/4.jpg" alt="Rénovation" loading="lazy">
                    <h3>Rénovation</h3>
                    <p>Transformation et modernisation de vos espaces.</p>
                </div>
                <div class="service">
                    <img src="http://localhost:8888/topub/public/img/entreprises/3.jpg" alt="Consultation" loading="lazy">
                    <h3>Consultation</h3>
                    <p>Conseils d'experts pour planifier vos projets de construction.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <h2>À Propos de Nous</h2>
            <p>Avec plus de 20 ans d'expérience, nous sommes l'un des principaux acteurs dans le domaine de la construction. Nous offrons des services de qualité pour satisfaire nos clients.</p>
            <img src="images/about-us.jpg" alt="Notre équipe" class="about-image" loading="lazy">
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h2>Contactez-nous</h2>
            <?php if ($message_sent): ?>
                <p style="color: green; font-weight: bold;">Merci pour votre message. Nous vous répondrons sous peu.</p>
            <?php elseif (!empty($error_message)): ?>
                <p style="color: red; font-weight: bold;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form action="#contact" method="POST" novalidate>
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" required value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>

                <button type="submit" class="btn">Envoyer</button>
            </form>
        </div>
    </section>

    <footer>
        <p>© 2024 Entreprise de Bâtiment XYZ. Tous droits réservés.</p>
    </footer>
</body>
</html>
