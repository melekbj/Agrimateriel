<article>
    <div class="formulaire">
        <br>
        <h3 class="titre1"> Modifier votre annonce </h3>
        <div class="bloc2"></div>
        <div class="col-md-5 offset-md-4">
            <?php $idMateriel = $up->getIdMateriel(); ?>
            <form name="inscri" method="POST"
                action="index.php?controller=annonceMateriel&action=updated&idMateriel=<?= $idMateriel ?>"
                enctype="multipart/form-data">
                <div class="form-group input-group-sm">
                    <br> <br>


                    <table>
                        <tr>
                            <td> <label for="nom">
                                    <p>Nom Matériel :</p>
                            </td>
                            <td> <input type="text" class="ch1" required id="nom" name="nom"
                                    value="<?php echo $up->getNomMateriel() ?>">
                                </label>
                            </td>
                        </tr>


                        <?php $ga = $up->getCategories() ?>
                        <tr>
                            <td> <label for="categorie">
                                    <p> Catégories </p>

                                </label> </td>

                            <td> <select class="ch2" required name="categorie" id="categorie">

                                    <?php if ($ga == "tracteurs")
                                        echo  '<option value="tracteurs" selected> Tracteurs</option>';
                                    else  echo  '<option value="tracteurs"> Tracteurs</option>'; ?>


                                    <?php if ($ga == "ensileuses")
                                        echo  '<option value="ensileuses" selected> Ensileuses</option>';
                                    else  echo  '<option value="ensileuses"> ensileuses</option>'; ?>


                                    <?php if ($ga == "moissonneuses-batteuses")
                                        echo  '<option value="moissonneuses-batteuses" selected> moissonneuses-batteuses</option>';
                                    else  echo  '<option value="moissonneuses-batteuses"> moissonneuses-batteuses</option>'; ?>

                                    <?php if ($ga == "recolteuses")
                                        echo  '<option value="recolteuses" selected>Récolteuses à betteraves et pommes de terre</option>';
                                    else  echo  '<option value="recolteuses"> Récolteuses à betteraves et pommes de terre</option>'; ?>

                                    <?php if ($ga == "faucheuses")
                                        echo  '<option value="faucheuses" selected>Faucheuses</option>';
                                    else  echo  '<option value="faucheuses"> Faucheuses</option>'; ?>


                                    <?php if ($ga == "presses")
                                        echo  '<option value="presses" selected>Presses</option>';
                                    else  echo  '<option value="presses"> Presses</option>'; ?>

                                    <?php if ($ga == "sol")
                                        echo  '<option value="sol" selected>Outils de travail du sol</option>';
                                    else  echo  '<option value="sol"> Outils de travail du sol</option>'; ?>

                                    <?php if ($ga == "manutention")
                                        echo  '<option value="manutention" selected>Engins de manutention</option>';
                                    else  echo  '<option value="manutention"> Engins de manutention</option>'; ?>


                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td> <label for="description">
                                    <p>Description : </p>
                                </label></td>
                            <td> <textarea rows="4" cols="35" class="ch3" required id="description"
                                    name="description"><?php echo $up->getDescription() ?></textarea></td>
                        </tr>




                        <?php $v = $up->getAdresse() ?>


                        <tr>
                            <td> <label for="adresse">
                                    <p> Ville : </p>
                                </label> </td>
                            <td> <select class="ch2" required name="adresse" id="adresse">


                                    <?php if ($v == "tunis")
                                        echo  '<option value="tunis" selected> Tunis</option>';
                                    else  echo  '<option value="tunis"> Tunis</option>'; ?>

                                    <?php if ($v == "ariana")
                                        echo  '<option value="ariana" selected> Ariana</option>';
                                    else  echo  '<option value="ariana"> Ariana</option>'; ?>

                                    <?php if ($v == "beja")
                                        echo  '<option value="beja" selected> Béja</option>';
                                    else  echo  '<option value="beja">Béja</option>'; ?>


                                    <?php if ($v == "bizerte")
                                        echo  '<option value="bizerte" selected> Bizerte</option>';
                                    else  echo  '<option value="bizerte"> Bizerte</option>'; ?>


                                    <?php if ($v == "manouba")
                                        echo  '<option value="manouba" selected> Manouba </option>';
                                    else  echo  '<option value="manouba"> Manouba</option>'; ?>


                                    <?php if ($v == "gabes")
                                        echo  '<option value="gabes" selected> Gabes </option>';
                                    else  echo  '<option value="gabes"> Gabes</option>'; ?>

                                    <?php if ($v == "mahdia")
                                        echo  '<option value="mahdia" selected>Mahdia </option>';
                                    else  echo  '<option value="mahdia"> Mahdia</option>'; ?>

                                    <?php if ($v == "nabeul")
                                        echo  '<option value="nabeul" selected> Nabeul </option>';
                                    else  echo  '<option value="nabeul"> Nabeul</option>'; ?>

                                    <?php if ($v == "sfax")
                                        echo  '<option value="sfax" selected> Sfax </option>';
                                    else  echo  '<option value="sfax"> Sfax </option>'; ?>

                                    <?php if ($v == "siliana")
                                        echo  '<option value="siliana" selected> Siliana  </option>';
                                    else  echo  '<option value="sfax"> Sfax </option>'; ?>

                                    <?php if ($v == "kairouan")
                                        echo  '<option value="kairouan" selected> Kairouan </option>';
                                    else  echo  '<option value="kairouan"> Kairouan </option>'; ?>

                                    <?php if ($v == "kef")
                                        echo  '<option value="kef" selected> Kef </option>';
                                    else  echo  '<option value="kef"> Kef </option>'; ?>


                                    <?php if ($v == "jandouba")
                                        echo  '<option value="jandouba" selected> Jandouba </option>';
                                    else  echo  '<option value="jandouba"> Jandouba </option>'; ?>

                                    <?php if ($v == "sousse")
                                        echo  '<option value="sousse" selected> Sousse </option>';
                                    else  echo  '<option value="sousse"> Sousse </option>'; ?>


                                </select>
                            </td>
                        </tr>









                        <tr>
                            <td> <label for="prixHeure">
                                    <p> Prix par heure </p>
                            </td>
                            <td> <input type="text" class="ch1" required id="prixHeure" name="prixHeure"
                                    value="<?php echo $up->getPrixHeure() ?>">
                                </label> </td>
                        </tr>
                        <!-- if if value taswira jdida fera8 ye5o value mte3 taswira 9dima  -->

                        <tr>
                            <td>
                                <img src="./image/uploads/<?php echo $up->getPhoto(); ?>" height="100" width="150">
                            </td>
                            <td> <input type="file" name="photo" id="photo" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right"><button class="btnCreer" type="submit" class="bttn"> <i
                                        class='fa fa-edit'> </i> Modifier
                                </button></td>
                        </tr>


                    </table>


                </div>
            </form>
        </div>
    </div>
</article>