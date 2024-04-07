<?php if (isset($_SESSION['idAdmin'])) { ?>

<div class="blocContactAdmin">

    <h5> Ajouter un utilisateur </h5> <br> </br>

    <form method="POST" action="index.php?controller=client&action=created&admin=1">
        <fieldset>
            <table>
                <tr>
                    <td>


                        <label for="nom"> Nom : </label> </td>
                    <td>
                        <input type="text" class="ch1" id="nom" name="nom" placeholder="Nom" required>
                    </td>
                </tr>
                <tr>
                    <td>


                        <label for="prenom"> Prénom : </label> </td>
                    <td>
                        <input type="text" class="ch1" id="prenom" name="prenom" placeholder="prenom" required>


                    </td>
                </tr>
                <tr>
                    <td>


                        <label for="sexe">
                            Sexe : </label> </td>
                    <td>
                        <input type="radio" name="sexe" id="sexe" value="Homme" /> Homme
                        <input type="radio" name="sexe" id="sexe" value="Femme" /> Femme


                    </td>
                </tr>
                <tr>
                    <td>

                        <label for="telephone"> Numero de téléphone : </label> </td>
                    <td>
                        <input type="number" class="ch1" id="telephone" name="telephone" placeholder="telephone"
                            required>

                    </td>
                </tr>
                <tr>
                    <td>

                        <label for="emailClient">
                            Email : </label> </td>
                    <td>
                        <input type="email" class="ch1" id="emailClient" name="emailClient" placeholder="email"
                            required>

                    </td>
                </tr>
                <tr>
                    <td>



                        <label for="mdpClient">
                            Mot de passe : </label> </td>
                    <td>
                        <input type="password" class="ch1" id="mdpClient" name="mdpClient" placeholder="mot de passe"
                            required>

                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td>
                        <br>
                        <input class="btnModPrAd" type="submit" value="Envoyer" />
                    </td>
                </tr>
            </table>

            </br>
        </fieldset>
    </form>
    <br>
</div>
<?php } ?>