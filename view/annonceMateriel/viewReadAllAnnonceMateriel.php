<section>
    <h3 class="titre1 "> <br>Matériels</h3>
    <div class="bloc2"></div> <br><br>




    <!-- formulaire de recherche  -->
    <div class="container">

        <?php if (isset($_SESSION['flash'])) { ?>
        <?php foreach ($_SESSION['flash'] as $type => $message) { ?>

        <!-- Affichage la msg de succes -->
        <div class="alert alert-success" role="alert">
            <?php echo '<i class="fa fa-check"></i>  ' . $message; ?>
        </div>
        <?php } ?>
        <?php unset($_SESSION['flash']);
        } ?>


        <?php if (isset($_SESSION['erreur'])) { ?>
        <?php foreach ($_SESSION['erreur'] as $type => $message) { ?>


        <!-- Affichage la msg de errr -->
        <div class="alert alert-danger" role="alert">
            <?php echo '<i class="fa fa-times"></i>  ' . $message; ?>
        </div>
        <?php } ?>
        <?php unset($_SESSION['erreur']);
        } ?>

        <form method="post" action="index.php?controller=annonceMateriel&action=recherche">
            <label for=" nom"> Nom : </label>
            <input type="text" name="nom" id="nom" class="nomRech" placeholder="Nom de le materiel" />
            <label for="categorie"> &nbsp; &nbsp; &nbsp;Categorie :</label>
            <select name="categorie" id="categorie" class="adrRech">
                <option value="Sélectionner une Categorie"> Sélectionner une Categorie</option>
                <option value="tracteurs"> Tracteurs</option>
                <option value="moissonneuses-batteuses">Moissonneuses-batteuses</option>
                <option value="ensileuses"> Ensileuses</option>
                <option value="récolteuses">Récolteuses à betteraves et pommes de terre</option>
                <option value="faucheuses">Faucheuses</option>
                <option value="presses">Presses</option>
                <option value="sol">Outils de travail du sol</option>
                <option value="manutention"> Engins de manutention </option>
            </select>


            <label for="adresse"> &nbsp; &nbsp; &nbsp; Adresse : </label>


            <select name="adresse" class="adrRech" id="adresse">
                <option value="Sélectionner une ville"> Séléctionner une ville </option>
                <option value="Tunis">Tunis</option>
                <option value="Ariana">Ariana</option>
                <option value="Béja">Béja</option>
                <option value="Bizerte">Bizerte</option>
                <option value="La_Manouba">La Manouba</option>
                <option value="Gabes">Gabes</option>
                <option value="Mahdia">Mahdia</option>
                <option value="Nabeul">Nabeul</option>
                <option value="Sfax">Sfax</option>
                <option value="Siliana">Siliana</option>
                <option value="Kairouan">Kairouan</option>
                <option value="kef">kef</option>
                <option value="jandouba">jandouba</option>
                <option value="sousse"> sousse</option>
                <option value="sidibouzid "> Sidi bouzid</option>
            </select>



            &nbsp; &nbsp; &nbsp; <button type="search" class="rechBtn"> Rechercher </button>

        </form>
        <br> <br>


    </div>



    <div class="container">

        <div id="" class="row ">
            <?php foreach ($tab_materiel as $a) {
                $etat = $a->getEtat();
                if ($etat == "1") { ?>
            <div class="col-3 as">
                <?php $idMateriel = $a->getIdMateriel(); ?>
                <div class="bl">
                    <div class="">
                        <img src="./image/uploads/<?php echo $a->getPhoto(); ?>" height="200" width="255">
                    </div>
                    <div class="">
                        <h4 class="nomLouer">
                            <?php echo $a->getNomMateriel(); ?>
                        </h4>
                        <p class="catLouer">
                            <?php echo "Categorie : " . $a->getCategories(); ?> </p>
                        <p class="dscrpLouer">
                            <?php echo $a->getDescription(); ?>
                        </p>
                        <p class="adrLouer"> <?php echo "<i class='fas fa-map-marker-alt'></i> " . $a->getAdresse(); ?>
                            <br>
                            <?php echo "<i class='fas fa-user'></i> " . $a->getNom() . " " . $a->getPrenom(); ?> </p>

                        <div class="row">
                            <div class="col-10" align="right">
                                <p class="lead prLouer">
                                    <?php echo "Prix  : " . $a->getPrixHeure() . " DT/h" ?> </p>
                            </div>
                            <div class="col-12">
                                <a class="btn btn-success  btn-louer "
                                    href="index.php?controller=commande&action=create&idMateriel=<?= $idMateriel ?>">Louer</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php }
            }
            ?>
        </div>



    </div>

</section>