<?php if (isset($_SESSION['idAdmin'])) { ?>

<div class="blocAnnonceAdmin">
    <h5> Liste des annonces </h5><br><br>

    <?php if (isset($_SESSION['flash'])) { ?>
    <?php foreach ($_SESSION['flash'] as $type => $message) { ?>

    <!-- Affichage la msg de succes -->
    <div class="alert alert-success" role="alert">
        <?php echo '<i class="fa fa-check"></i>  ' . $message; ?>
    </div>
    <?php } ?>
    <?php unset($_SESSION['flash']);
        } ?>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">En cours</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Annonces acceptées</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#refu" role="tab" aria-controls="contact"
                aria-selected="false">Annonces réfusées</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!--********************************************Les annonces en cours************************************************ -->

        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Nom materiel</th>
                        <th scope="col">catégorie</th>
                        <th scope="col">Description</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Client</th>
                        <th scope="col">Prix/h</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tab_materiel as $a) {
                            $etat = $a->getEtat();
                            if ($etat == "0") { ?>
                    <tr>
                        <th scope="row"> <?php echo $a->getIdMateriel(); ?></th>
                        <td> <img src="./image/uploads/<?php echo $a->getPhoto(); ?>" height="40" width="80">
                            <?php echo  $a->getNomMateriel(); ?> </td>
                        <td><?php echo $a->getCategories(); ?></td>
                        <td> <?php echo  $a->getDescription(); ?></td>
                        <td> <?php echo  $a->getAdresse();  ?></td>
                        <td> <?php echo  $a->getIdClient(); ?></td>
                        <td><?php echo  $a->getPrixHeure(); ?></td>
                        <td>
                            <?php $idMateriel = $a->getIdMateriel(); ?>
                            <a class='colorvert'
                                href='index.php?controller=annonceMateriel&action=accepte&admin=1&idMateriel=<?= $idMateriel; ?>'>
                                <i class='fa fa-check'>Accepter</i>
                            </a>
                            <a class='colorouge'
                                href='index.php?controller=annonceMateriel&action=refuse&admin=1&idMateriel=<?= $idMateriel; ?>'><i
                                    class='fa fa-times'>Réfuser </i>
                            </a>
                        </td>
                    </tr>
                    <?php }
                        } ?>
                </tbody>
            </table>
        </div>

        <!--********************************************Les annonces acceptés************************************************ -->

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby=" profile-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Nom materiel</th>
                        <th scope="col">catégorie</th>
                        <th scope="col">Description</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Client</th>
                        <th scope="col">Prix/h</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tab_materiel as $a) {
                            $etat = $a->getEtat();
                            if ($etat == "1") { ?>
                    <tr>
                        <th scope="row"> <?php echo $a->getIdMateriel(); ?></th>
                        <td> <img src="./image/uploads/<?php echo $a->getPhoto(); ?>" height="40" width="80">
                            <?php echo  $a->getNomMateriel(); ?> </td>
                        <td><?php echo $a->getCategories(); ?></td>
                        <td> <?php echo  $a->getDescription(); ?></td>
                        <td> <?php echo  $a->getAdresse();  ?></td>
                        <td> <?php echo  $a->getIdClient(); ?></td>
                        <td><?php echo  $a->getPrixHeure(); ?></td>

                    </tr>
                    <?php }
                        } ?>
                </tbody>
            </table>
        </div>

        <!--********************************************Les annonces refusée************************************************ -->

        <div class="tab-pane fade" role="tabpanel" id="refu" aria-labelledby="contact-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Nom materiel</th>
                        <th scope="col">catégorie</th>
                        <th scope="col">Description</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Client</th>
                        <th scope="col">Prix/h</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tab_materiel as $a) {
                            $etat = $a->getEtat();
                            if ($etat == "2") { ?>
                    <tr>
                        <th scope="row"> <?php echo $a->getIdMateriel(); ?></th>
                        <td> <img src="./image/uploads/<?php echo $a->getPhoto(); ?>" height="40" width="80">
                            <?php echo  $a->getNomMateriel(); ?> </td>
                        <td><?php echo $a->getCategories(); ?></td>
                        <td> <?php echo  $a->getDescription(); ?></td>
                        <td> <?php echo  $a->getAdresse();  ?></td>
                        <td> <?php echo  $a->getIdClient(); ?></td>
                        <td><?php echo  $a->getPrixHeure(); ?></td>

                    </tr>
                    <?php }
                        } ?>
                </tbody>
            </table>

        </div>


    </div>
</div>


<?php

}

?>