<?php if (!isset($_SESSION['idClient'])) { ?>

<article>
    <div class="formulaire">
        <br>
        <h3 class="titre1"> Inscription </h3>
        <div class="bloc2"></div> <br><br>
        <?php if (isset($_SESSION['flash'])) { ?>
        <?php foreach ($_SESSION['flash'] as $type => $message) { ?>


        <!-- Affichage la msg de danger -->
        <div class="alert alert-danger" role="alert">
            <?= $message; ?>
        </div>
        <?php } ?>
        <?php unset($_SESSION['flash']);
            } ?>





        <div class="col-md-5 offset-md-4">
            <form name="inscri" method="POST" action="index.php?controller=client&action=created">
                <div class="form-group input-group-sm">
                    <table>
                        <tr>
                            <td> <label for="nom">
                                    <p>Nom :</p>
                            </td>
                            <td> <input class="ch1" type="text" id="nom" name="nom" placeholder="Votre nom"> </label>
                                <div id="myDiv" style=" color:black; size:150px"></div>
                            </td>
                        </tr>


                        <tr>
                            <td> <label for="prenom">
                                    <p> Prénom :</p>
                            </td>
                            <td> <input type="text" class="ch1" id="prenom" name="prenom" placeholder="Votre prenom">
                                </label>

                                <div id="divPrenom" style=" color:black; size:150px"></div>

                            </td>

                        </tr>


                        <tr>

                            <td> <label for="sexe">
                                    <p> Sexe : </p>
                                </label>
                            </td>
                            <td> <input type="radio" name="sexe" id="sexe" value="Homme" /> Homme
                                <input type="radio" name="sexe" id="sexe" value="Femme" /> Femme
                                <div id="divSexe" style=" color:black; size:150px"></div>
                            </td>



                        </tr>



                        <tr>
                            <td> <label for="telephone">
                                    <p> Numero de téléphone :</p>
                            </td>
                            <td> <input type="number" class="ch1" id="telephone" name="telephone"
                                    placeholder="Numéro de téléphone">
                                </label>
                                <div id="divTel" style=" color:black; size:150px"></div>
                            </td>
                        </tr>

                        <tr>
                            <td> <label for="emailClient">
                                    <p> Email :</p>
                            </td>
                            <td> <input type="email" class="ch1" id="emailClient" name="emailClient"
                                    placeholder="Adresse email">
                                </label>
                                <div id="divEmail" style=" color:black; size:150px"></div>
                            </td>
                        </tr>

                        <tr>
                            <td> <label for="mdpClient">
                                    <p> Mot de passe </p>
                            </td>
                            <td> <input type="password" class="ch1" id="mdpClient" name="mdpClient"
                                    placeholder="Mot de passe"> </label> </td>
                        </tr>

                        <tr>
                            <td> <label for="mdp2">
                                    <p> Confirmation de mot passe : </p>
                            </td>
                            <td> <input type="password" class="ch1" id="mdp2" name="mdp2"
                                    placeholder="Confirmer mot de passe" required> </label> </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td align="right"><button class="btnCreer" type="submit" class="bttn" onclick="verife()">
                                    S'insrire
                                </button></td>
                        </tr>

                    </table>

                    Vous avez déjà un compte ? <a href="index.php?controller=client&action=connect">Connectez-vous </a>

                </div>

            </form>
        </div>
    </div>
</article>
<?php } else  header("Location: index.php?controller=client&action=profil"); ?>