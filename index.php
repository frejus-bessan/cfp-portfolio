<?php
session_start();

include_once(__DIR__ . '/commun/fonctions.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="./public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/fontawesome/css/all.min.css" />
</head>

<body>
    <?php include_once(__DIR__ . '/commun/header.php') ?>

    <main>

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php
                    if (isset($_SESSION['global_success'])) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['global_success'] ?>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['global_error'])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_SESSION['global_error'] ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <?php router() ?>

        </div>

    </main>


    <?php include_once(__DIR__ . '/commun/footer.php') ?>

</body>

<script src="./public/bootstrap/js/bootstrap.min.js"></script>
<script src="./public/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>

<?php
unset($_SESSION['global_error'], $_SESSION['global_success'], $_SESSION['errors'], $_SESSION['data'])
    ?>