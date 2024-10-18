<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?= base_url(); ?>assets/home/favico.png" type="image/png" />
    <!--plugins-->
    <link href="<?= base_url(); ?>assets/backend/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/backend/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= base_url(); ?>assets/backend/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?= base_url(); ?>assets/backend/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>assets/backend/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/backend/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="../../../../fonts.googleapis.com/css276c7.css?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/backend/assets/css/app.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/backend/assets/css/icons.css" rel="stylesheet">
    <!-- notifications CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/css/notifications/notifications.css">
    <title><?= $title; ?></title>
    <style>
        body {
            background-image: url('<?= base_url(); ?>assets/back-08.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-4">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mt-5 mt-lg-0">
                            <div class="card-body">
                                <div class="p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="" style="font-family: 'arial';">Connexion</h3>
                                        <!--<p>Vous n'avez pas encore de compte? <a href="<?= base_url()?>creation-de-compte">Créer ici</a>-->
                                    </div>
                                    <div class="login-separater text-center mb-4" style="font-family: 'Helvetica';"> <span>Connectez-vous avec votre login</span>
                                        <hr/>
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" id="loginForm">
                                            <?= csrf_field() ?>
                                            <div class="col-12">
                                                <label for="login" class="form-label" style="font-family: 'Helvetica';">Votre Login</label>
                                                <input type="text" name="login" class="form-control" id="login" placeholder="Telephone ou email">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label" style="font-family: 'Helvetica';">Entrer votre mot de passe</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword"  placeholder="Entrer votre mot de passe"> 
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary" style="background-color: #0A0137;"><i class="bx bxs-lock-open" style="font-family: 'Helvetica';"></i>Connexion</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <!--<footer class="bg-white shadow-sm border-top p-2 text-center fixed-bottom">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>-->
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="<?= base_url(); ?>assets/backend/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?= base_url(); ?>assets/backend/assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script src="<?= base_url(); ?>assets/backend/js/notifications/Lobibox.js"></script>
    <script src="<?= base_url(); ?>assets/backend/js/notifications/notification-active.js"></script>
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>

    <script>
        $('#loginForm').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url()?>connexion',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success == true) {
                        console.log(response.data);
                        Lobibox.notify('success', {
                            // img: `<?= base_url()?>${response.data.avatar}`,
                            msg: response.message
                        });
                        window.location="<?= base_url()?>" +response.url;
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
