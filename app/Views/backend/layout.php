<?php
// index.php
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
                    <li class="nav-item"><a class="nav-link" href="#">Lien Télégram</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Autre action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Déconnexion</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-primary text-white" id="sidebar-wrapper" style="background-color: #1b3049 !important;">
            <!--<div class="sidebar-heading text-center py-4 fs-4 fw-bold text-uppercase border-bottom">
                Menu
            </div>-->
            <div class="list-group list-group-flush my-3">
                <a href="<?= base_url()?>edm-admin" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-tachometer-alt me-2"></i> Tableau de Bord
                </a>
                <a href="<?= base_url() ?>auditeurs" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-users me-2"></i> Etudiants
                </a>
                <a href="<?= base_url(); ?>disciplines" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-folder me-2"></i> Cours
                </a>
                <a href="<?= base_url(); ?>reponses" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-user me-2"></i> Examens Etudiants
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-cog me-2"></i> Paramètres
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                </a>
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
    <!-- Custom JS -->
    <script>

        // assets/js/scripts.js

document.getElementById("menu-toggle").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("wrapper").classList.toggle("toggled");
});

// Graphique avec Chart.js
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', // Type de graphique (bar, line, pie, etc.)
        data: {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'],
            datasets: [{
                label: 'Ventes',
                data: [12, 19, 8, 5, 2, 3],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)', // Vert
                    'rgb(47, 67, 98) !important', // Bleu
                    'rgba(255, 206, 86, 0.2)', // Jaune
                    'rgba(255, 99, 132, 0.2)', // Rouge
                    'rgba(153, 102, 255, 0.2)', // Violet
                    'rgba(255, 159, 64, 0.2)'  // Orange
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)', // Vert
                    'rgba(54, 162, 235, 1)', // Bleu
                    'rgba(255, 206, 86, 1)', // Jaune
                    'rgba(255, 99, 132, 1)', // Rouge
                    'rgba(153, 102, 255, 1)', // Violet
                    'rgba(255, 159, 64, 1)'  // Orange
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});


    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cardsPerPage = 6; // Nombre de cartes par page
        const studentCards = document.querySelectorAll('.student-card-item');
        const totalCards = studentCards.length;
        const totalPages = Math.ceil(totalCards / cardsPerPage);
        const pagination = document.getElementById('pagination');

        let currentPage = 1;

        function showPage(page) {
            // Cacher toutes les cartes
            studentCards.forEach((card, index) => {
                card.style.display = 'none';
            });

            // Calculer les indices des cartes à afficher
            const start = (page - 1) * cardsPerPage;
            const end = start + cardsPerPage;

            // Afficher les cartes de la page actuelle
            for (let i = start; i < end && i < totalCards; i++) {
                studentCards[i].style.display = 'block';
            }

            // Mettre à jour les classes actives de la pagination
            const paginationItems = pagination.querySelectorAll('li');
            paginationItems.forEach((item, index) => {
                if (index === page) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        function setupPagination() {
            // Créer les éléments de pagination
            for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement('li');
                li.classList.add('page-item');
                if (i === 1) li.classList.add('active');

                const a = document.createElement('a');
                a.classList.add('page-link');
                a.href = '#';
                a.textContent = i;
                a.dataset.page = i;

                a.addEventListener('click', function (e) {
                    e.preventDefault();
                    currentPage = Number(this.dataset.page);
                    showPage(currentPage);
                });

                li.appendChild(a);
                pagination.appendChild(li);
            }

            // Boutons Précédent et Suivant
            // Bouton Précédent
            const prevLi = document.createElement('li');
            prevLi.classList.add('page-item');

            const prevA = document.createElement('a');
            prevA.classList.add('page-link');
            prevA.href = '#';
            prevA.textContent = 'Précédent';
            prevA.addEventListener('click', function (e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                }
            });

            prevLi.appendChild(prevA);
            pagination.insertBefore(prevLi, pagination.firstChild);

            // Bouton Suivant
            const nextLi = document.createElement('li');
            nextLi.classList.add('page-item');

            const nextA = document.createElement('a');
            nextA.classList.add('page-link');
            nextA.href = '#';
            nextA.textContent = 'Suivant';
            nextA.addEventListener('click', function (e) {
                e.preventDefault();
                if (currentPage < totalPages) {
                    currentPage++;
                    showPage(currentPage);
                }
            });

            nextLi.appendChild(nextA);
            pagination.appendChild(nextLi);
        }

        setupPagination();
        showPage(currentPage);
    });
</script>


<script>
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
</script>

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
                        if (response.success == true) {
                            Lobibox.notify('success', {
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
</body>
</html>
