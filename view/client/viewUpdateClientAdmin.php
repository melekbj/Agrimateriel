<?php
$idClient = $up->getIdClient();

if (isset($_SESSION['idAdmin'])) {
?>

<div class="blocContactAdmin">

    <h5> Modifier client n° <?php echo $idClient; ?></h5><br> </br>

    <form method="POST" action="index.php?controller=client&action=updated&admin=1&idClient=<?php echo $idClient ?>">
        <fieldset>
            <table>
                <tr>

                    <td>
                        <label for="nom">Nom :</label> </td>
                    <td> <input type="text" value="<?= $up->getNom() ?>" class="ch1" name="nom" id="nom" required />

                    </td>
                </tr>
                <tr>
                    <td> <label for="prenom">Prénom : </label> </td>
                    <td>
                        <input type="text" class="ch1" value="<?= $up->getPrenom() ?>" name="prenom" id="prenom"
                            required />

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="emailClient">Email :</label> </td>
                    <td>
                        <input type="email" class="ch1" value="<?= $up->getEmailClient() ?>" name="emailClient"
                            id="emailClient" required />


                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="sexe">
                            <p> Sexe : </p>
                        </label> </td>
                    <td>

                        <?php if ($up->getSexe() == 'Homme') { ?>
                        <input type="radio" name="sexe" id="sexe" value="Homme" checked /> Homme
                        <input type="radio" name="sexe" id="sexe" value="Femme" /> Femme

                        <?php } else { ?>
                        <div class="radio">
                            <label><input type="radio" name="sexe" value="Homme">Homme</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="sexe" value="Femme" checked>Femme</label>
                        </div>

                        <?php  } ?>
                    </td>
                </tr>
                <tr>
                    <td>

                        <label for="telephone"> Télèphone : </label> </td>
                    <td>
                        <input type="number" required class="ch1" id="telephone" name="telephone"
                            value="<?php echo $up->getTelephone();  ?>">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mdcClient" class="col-form-label"> Mot de passe : </label> </td>
                    <td>
                        <input type="password" class="ch1" required id="mdpClient" name="mdpClient"></p>

                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td>

                        <input class="btnModPrAd" type="submit" value="Modifier" /> </td>
                </tr>
            </table>

        </fieldset>
    </form>
    <br></br>
</div>
<?php } ?>