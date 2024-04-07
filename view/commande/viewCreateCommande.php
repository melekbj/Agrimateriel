<?php if (isset($_SESSION['idClient'])) { ?>

<article>
    <div class="commande">
        <br>
        <h3 class="titre1"> Envoyer une commande </h3>
        <div class="bloc2"></div> <br><br>
        <div class="container">
            <div class="row">
                <div class="col-6 blocMaC">
                    <div class="row">
                        <div class="col-6">
                            <img class="imgInsCmd" src="./image/uploads/<?php echo $tab->getPhoto(); ?> " height="230"
                                width="300">
                        </div>
                        <div class="col-4">
                            <?php
                                echo " <p class='dtCmd' > <i class='fa fa-clock '></i> Date d'ajout " . $tab->getDateAjout() . "</p>";
                                echo " <p class='nomCmd' >  " . $tab->getNomMateriel() . "</p>";

                                echo " <p class='caCmd' > Catégorie: " . $tab->getCategories() . "</p>";
                                echo " <p class='desCmd' > " . $tab->getDescription() . "</p>";
                                echo " <p class='' > <i class='fas fa-map-marker-alt'></i>  " . $tab->getAdresse() . "</p>";
                                echo " <p  class=' hCmd' >   " . $tab->getPrixHeure() . " DT/Heure </p>";


                                ?>
                        </div>



                        <div class="col-3"> <br>
                            <?php echo "<i class='fa fa-user '></i> " . $tab->getNom() . " " . $tab->getPrenom(); ?>
                        </div>
                        <div class="col-3"> <br>
                            <?php echo "<i class='fa fa-phone '></i> " . $tab->getTelephone(); ?>
                        </div>
                        <div class="col-4"> <br>
                            <?php echo "<i class='fa fa-envelope '></i> " . $tab->getEmailClient(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-5 blocInCom">
                    <form method="POST" name="commande"
                        action="index.php?controller=commande&action=envoyer&idMateriel=<?= $idMateriel ?>">
                        <table>
                            <tr>
                                <td> <label for="dateCommande">
                                        <p>Date du louer:</p>
                                </td>
                                <td> <input type="date" class="ch2" id="dateCommande" name="dateCommande"
                                        required></label> </td>
                            </tr>
                            <tr>
                                <td> <label for="heureDebut">
                                        <p>Heure de </p>
                                </td>
                                <td> <input type="time" id="heureDebut" class="ch2" name="heureDebut" required></label>
                                </td>
                            </tr>
                            <tr>
                                <td> <label for="nbrHeure">
                                        <p> Nombre d'heures : </p>
                                    </label> </td>
                                <td> <select name="nbrHeure" class="ch2" id="nbrHeure" required>
                                        <option value="selection" selected> Séléctionner le Nombre d'heures
                                        </option>
                                        <option value="1">1h</option>
                                        <option value="2">2h</option>
                                        <option value="3">3h</option>
                                        <option value="4">4h</option>
                                        <option value="5">5h</option>
                                        <option value="6">1 jour</option>
                                        <option value="7">2 jours</option>
                                        <option value="8">3 jours</option>
                                        <option value="9">1 semaine</option>
                                    </select>
                                    <div id="divHeure" style=" color:black; size:150px"></div>
                                </td>
                            <tr>
                                <td></td>
                                <td align="right"><button class="btnCmd" type="submit" class="bttn" onclick="test()">
                                        Envoyer la commande
                                    </button></td>
                            </tr>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</article>

<?php } else   require_once("{$ROOT}{$DS}view{$DS}indisponible.php"); ?>