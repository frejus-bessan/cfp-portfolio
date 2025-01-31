<?php
$projects = get_projects($_SESSION['utilisateur_connecter']['id']);
//var_dump($projects)
?>
<style>
    .t {
        object-fit: co;
    }
</style>
<div class="">
    <div class="row justify-content-end">
        <div class="col-md-2 mb-3">
            <a href="index.php?page=ajout-projet" class="btn btn-primary">+ Nouveau projet</a>
        </div>
    </div>
    <div class="row gy-4">

        <?php
        if (count($projects) > 0) {
            foreach ($projects as $project) {
                ?>
                <div class="col-md-3" data-bs-toggle="modal" data-bs-target="#project<?= $project["id"] ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100" >
                                <img src="app/public/img/upload/<?= $project['image'] ?>" class="w-100"
                                 alt="Image du projet">
                            </div>
                            <p class="p-1 m-0 text-sm fw-bold"><?= $project['name'] ?></p>

                            <p class="p-1 m-0 text-sm text-muted"><em
                                    class="text-justify"><?= $project['short_description'] ?></em></p>
                        </div>
                        <div class="card-footer d-flex gap-3">
                            <div class="col-md-6">
                                <a href="index.php?page=modifier-projet&id=<?= $project['id'] ?>"
                                    class="btn btn-warning">Modifier</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#delete_project<?= $project["id"] ?>"
                                    class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal d'aperçu -->
                <div class="modal fade" id="project<?= $project['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5"><?= $project['name'] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-1 w-100">
                                    <img src="app/public/img/upload/<?= $project['image'] ?>" class="w-100"
                                        alt="Image du projet">
                                </div>

                                <p class="p-1 m-0 text-sm text-muted"><em
                                        class="text-justify"><?= $project['description'] ?></em></p>
                                <hr class="m-0 mx-1">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de suppression -->
                <div class="modal fade" id="delete_project<?= $project['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Supprimer <?= $project['name'] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Êtes-vous sÛr(e) de vouloir supprimer ce projet ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                <a href="index.php?page=supprimer-projet&id=<?= $project['id'] ?>" class="btn btn-primary">Oui,
                                    supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <h3 class="text-center py-5">Aucun projet actuellement disponible.. <a
                    href="index.php?page=ajout-projet">Cliquez ici pour en ajouter</a></h3>
            <?php
        }
        ?>
    </div>
</div>