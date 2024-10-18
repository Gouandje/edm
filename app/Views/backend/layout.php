<?php
 $session = session(); 
 $currentUri = current_url();
//  $role = $session->get('role');
//  var_dump($role);
//  die();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/studentcard.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/notifications/notifications.css">
    <style>

        /* assets/css/styles.css */

        /* Styles du wrapper */
        #wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
            transition: all 0.3s ease;
            padding-top: 56px; /* Hauteur de la navbar (56px pour Bootstrap) */
        }

        /* Sidebar Styles */
        #sidebar-wrapper {
            min-width: 250px;
            max-width: 250px;
            background-color: #1b3049;
            transition: all 0.3s ease;
            position: fixed;
            top: 56px; /* Hauteur de la navbar */
            left: 0;
            height: 100%;
            overflow-y: auto;
        }

        #sidebar-wrapper .sidebar-heading {
            background-color: #1b3049;
            color: #fff;
        }

        #sidebar-wrapper .list-group a {
            background-color: #1b3049;
            border: none;
            padding: 15px 20px;
        }

        #sidebar-wrapper .list-group a:hover {
            background-color: #1b3049;
            color: #fff;
            text-decoration: none;
        }

        /* Page Content Styles */
        #page-content-wrapper {
            width: 100%;
            padding: 20px;
            margin-left: 250px; /* Largeur de la sidebar */
            transition: all 0.3s ease;
        }

        /* Menu Toggled Styles */
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -250px;
        }

        #wrapper.toggled #page-content-wrapper {
            margin-left: 0;
        }

        /* Media Queries pour Responsiveness */
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -250px;
            }
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }
            #page-content-wrapper {
                margin-left: 0;
            }
            #wrapper {
                flex-direction: column;
            }
        }

        .profile-img {
            width: 40px; /* Taille de l'image (réduit) */
            height: 40px; /* Taille de l'image (réduit) */
            border-radius: 50%; /* Rendre l'image circulaire */
            object-fit: cover; /* Pour éviter que l'image soit déformée */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" style="background-color: #1b3049 !important;">
        <div class="container-fluid">
            <button class="btn btn-outline-light me-3" id="menu-toggle"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand" href="#">Nom_Entreprise</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <?php if ($session->get('isLoggedIn')): ?>
                        <li class="nav-item"><a class="nav-link" href="#"><?= $session->get('nom_prenom'); ?></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Image de profil, stylisée en cercle et petite taille -->
                                <img src="<?= base_url(esc($session->get('avatar'))); ?>" alt="" class="profile-img" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url(); ?>deconnexion">Déconnexion</a>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
    <!-- /Navbar -->

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-primary text-white" id="sidebar-wrapper" style="background-color: #1b3049 !important;">
            <div class="list-group list-group-flush my-3">
                <?php if ($session->get('role') == 'administrateur') : ?>
                    <!-- Tableau de bord -->
                    <a href="<?= base_url()?>edm-admin" class="list-group-item list-group-item-action bg-primary text-white <?= ($currentUri == base_url() . 'edm-admin') ? 'active' : ''; ?>" style="background-color: #1b3049 !important;">
                        <i class="fas fa-tachometer-alt me-2"></i> Tableau de Bord
                    </a>
                <?php endif; ?>

                <?php if ($session->get('role') == 'auditeur') : ?>
                    <!-- Mon Compte -->
                    <a href="<?= base_url()?>mon-compte" class="list-group-item list-group-item-action bg-primary text-white <?= ($currentUri == base_url() . 'mon-compte') ? 'active' : ''; ?>" style="background-color: #1b3049 !important;">
                        <i class="fas fa-user me-2"></i> Mon Compte
                    </a>
                <?php endif; ?>

                <!-- Etudiants (Disponible uniquement pour un rôle spécifique) -->
                <?php if ($session->get('role') == 'administrateur') : ?>
                    <a href="<?= base_url() ?>auditeurs" class="list-group-item list-group-item-action bg-primary text-white <?= ($currentUri == base_url() . 'auditeurs') ? 'active' : ''; ?>" style="background-color: #1b3049 !important;">
                        <i class="fas fa-users me-2"></i> Etudiants
                    </a>
                <?php endif; ?>

                <!-- Cours (Accessible uniquement pour certains rôles) -->
                <?php if ($session->get('role') == 'administrateur') : ?>
                    <a href="<?= base_url(); ?>disciplines" class="list-group-item list-group-item-action bg-primary text-white <?= ($currentUri == base_url() . 'disciplines') ? 'active' : ''; ?>" style="background-color: #1b3049 !important;">
                        <i class="fas fa-folder me-2"></i> Cours
                    </a>
                <?php endif; ?>

                <?php if ($session->get('role') == 'administrateur') : ?>
                    <a href="<?= base_url(); ?>reponses" class="list-group-item list-group-item-action bg-primary text-white <?= ($currentUri == base_url() . 'reponses') ? 'active' : ''; ?>" style="background-color: #1b3049 !important;">
                    <i class="fas fa-user me-2"></i> Examens Etudiants
                </a>
                <?php endif; ?>

                <?php if ($session->get('role') == 'auditeur') : ?>
                    <a href="<?= base_url(); ?>mon-devoir" class="list-group-item list-group-item-action bg-primary text-white <?= ($currentUri == base_url() . 'mon-devoir') ? 'active' : ''; ?>" style="background-color: #1b3049 !important;">
                        <i class="fas fa-user me-2"></i> Mon devoir
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper">
             <!-- Page Content -->
            <?= $this->renderSection('content'); ?>
            <!-- /#page-content-wrapper -->
        </div>
       

        
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap JS et dépendances -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- notifications -->
    <!-- notification JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/js/notifications/Lobibox.js"></script>
    <script src="<?= base_url(); ?>assets/js/notifications/notification-active.js"></script>
    <script src="<?= base_url(); ?>assets/js/scripts.js"></script>


<!-- <script>
        document.getElementById('professor-add-form').addEventListener('submit', function(event) {
        	event.preventDefault(); // Empêche le formulaire de se soumettre normalement
			// let id = document.getElementById('encryptedId').value;
			var formData = new FormData(this);
			// Envoi de l'objet FormData via AJAX
			var xhr = new XMLHttpRequest();
			xhr.open('POST', `<?= base_url()?>professor/sauve-formateur`, true);
			xhr.onload = function () {
				if (xhr.status === 200) {
					var response = JSON.parse(xhr.responseText);
					if (response.success == true) {
                        Lobibox.notify('success', {
                            // img: `<?= base_url()?>${response.data.avatar}`,
                            msg: response.message
                        });
                        window.location="<?= base_url()?>formateurs";

					} else {
						Lobibox.notify('error', {
                            // img: <?= base_url()?>response.data.avatar,
                            msg: response.message
                        });
					}
				} else {
					Lobibox.notify('error', {
                        title: 'Erreur de connexion au serveur',
                        msg: 'Nous avons pas pu envoyer les informations au serveur'
                    });
				}
			};
			xhr.send(formData);
    	});
    </script>

    <script>
        $('#updateForm').on('submit', function(event) {
                event.preventDefault();
                var userId = $('#userId').val();
                var formData = new FormData(this);

                $.ajax({
                    url: '<?= base_url()?>sauve-modif-formateur/' + userId,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            Lobibox.notify('success', {
                            // img: `<?= base_url()?>${response.data.avatar}`,
                            msg: response.message
                        });
                        window.location="<?= base_url()?>formateurs";

                        } else {
                            Lobibox.notify('error', {
                            // img: <?= base_url()?>response.data.avatar,
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
    </script>

    <script>
        $('#addDisciplineForm').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: '<?= base_url()?>sauve-discipline',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            Lobibox.notify('success', {
                            // img: `<?= base_url()?>${response.data.avatar}`,
                            msg: response.message
                            });

                            window.location="<?= base_url()?>disciplines";
                        } else {
                            Lobibox.notify('error', {
                            // img: <?= base_url()?>response.data.avatar,
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
    </script>

    <script>
        $('#auditoraddform').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: '<?= base_url()?>sauve-auditeur',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            Lobibox.notify('success', {
                            // img: `<?= base_url()?>${response.data.avatar}`,
                            msg: response.message
                            });

                            window.location="<?= base_url()?>auditeurs";
                        } else {
                            Lobibox.notify('error', {
                            // img: <?= base_url()?>response.data.avatar,
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
    </script>
    
        <script>
            $('#auditoreditform').on('submit', function(event) {
                    event.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        url: '<?= base_url()?>sauve-modif-auditeur',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success == true) {
                                Lobibox.notify('success', {
                                // img: `<?= base_url()?>${response.data.avatar}`,
                                msg: response.message
                                });

                                window.location="<?= base_url()?>auditeurs";
                            } else {
                                Lobibox.notify('error', {
                                // img: <?= base_url()?>response.data.avatar,
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
    </script>

    <script>
        $('#questionaddform').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: '<?= base_url()?>save-questionnaire',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            Lobibox.notify('success', {
                            // img: `<?= base_url()?>${response.data.avatar}`,
                            msg: response.message
                            });

                            window.location="<?= base_url()?>liste-des-questions";
                        } else {
                            Lobibox.notify('error', {
                            // img: <?= base_url()?>response.data.avatar,
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
    </script>

    <script>
        $('#adminForm').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: '<?= base_url()?>ajout-admin',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            Lobibox.notify('success', {
                            // img: `<?= base_url()?>${response.data.avatar}`,
                            msg: response.message
                            });

                            window.location="<?= base_url()?>edm-admin";
                        } else {
                            Lobibox.notify('error', {
                            // img: <?= base_url()?>response.data.avatar,
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
    </script>
    
    <script>
        function toggleStatus(userId) {
            $.post('<?= base_url('modifier-stauts') ?>', { usrid: userId }, function(response) {
                if (response.success == true) {
                    Lobibox.notify('success', {
                        msg: response.message
                    });
                    // location.reload(); 
                } else {
                    Lobibox.notify('error', {
                        msg: response.message
                   });
                }
            }, 'json');
        }
    </script>

    <script>
        function deleteFormateur(userId) {
            $.post('<?= base_url('supprime-formateur') ?>', { usrid: userId }, function(response) {
                if (response.success == true) {
                    Lobibox.notify('success', {
                        msg: response.message
                    });
                    location.reload(); 
                } else {
                    Lobibox.notify('error', {
                        msg: response.message
                   });
                }
            }, 'json');
        }
    </script>

<script>
    function deleteAuditor(userId) {
        $.post('<?= base_url('supprime-auditeur') ?>', { usrid: userId }, function(response) {
            if (response.success == true) {
                Lobibox.notify('success', {
                    msg: response.message
                });
                location.reload(); 
            } else {
                Lobibox.notify('error', {
                    msg: response.message
               });
            }
        }, 'json');
    }
</script> -->

<script>
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
</script>

<script>
    $(document).ready(function() {
        $('#startDate, #endDate').on('change', function() {
            // Récupérer les valeurs des dates
            var startDate = new Date($('#startDate').val());
            var endDate = new Date($('#endDate').val());
            
            // Vérifier si la date de fin est inférieure à la date de début
            if (startDate && endDate && endDate < startDate) {
                // Afficher le message d'erreur
                $('#dateError').removeClass('d-none');
            } else {
                // Cacher le message d'erreur
                $('#dateError').addClass('d-none');
            }
        });

        // Envoyer les données via AJAX si elles sont valides
        $('#dateForm').on('submit', function(event) {
            event.preventDefault(); // Empêcher l'envoi par défaut du formulaire

            var startDate = new Date($('#startDate').val());
            var endDate = new Date($('#endDate').val());

            // Vérifier si la date de fin est valide avant l'envoi
            if (endDate >= startDate) {
                $.ajax({
                    url: '<?= base_url()?>export-xlsx',
                    method: 'POST',
                    data: {
                        startDate: $('#startDate').val(),
                        endDate: $('#endDate').val()
                    },
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
                            msg: errorThrown
                        });
                    }
                });
            } else {
                // Si les dates sont incorrectes, afficher un message d'erreur
                $('#dateError').removeClass('d-none');
            }
        });
    });
</script>

<script>
    $('#devoirForm').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '<?= base_url()?>valider-mon-devoir',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    Lobibox.notify('success', {
                    msg: response.message
                    });
                                    window.location="<?= base_url()?>mon-compte";
                    

                    // window.location="<?= base_url()?>auditeurs";
                } 
                else {
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
</script>

<script>
    $('#byauditoreditform').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url()?>sauve-modif-by-auditeur',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success == true) {
                        Lobibox.notify('success', {
                        // img: `<?= base_url()?>${response.data.avatar}`,
                        msg: response.message
                        });

                        location.reload(); 
                    } else {
                        Lobibox.notify('error', {
                        // img: <?= base_url()?>response.data.avatar,
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
</script>

</body>
</html>
