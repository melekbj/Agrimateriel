<br><br><br>
<!--------------- page contact -------------->
<section id="contact"> <br>
    <h3 class="titre1">Contact </h3>
    <div class="bloc2"></div> <br><br>

    <form name="formul" method="POST" action="index.php?controller=contact&action=contacter">

        <div class=" row">

            <div class="col-md-4 offset-md-1">
                <table>
                    <tr>
                        <td> <label for="nom">
                                <p>Nom : </p>
                            </label></td>
                        <td> <input type="text" id="nom" name="nom" class="for1" placeholder="Entrez votre nom"
                                required>
                            <br></td>
                    </tr>

                    <tr>
                        <td> <label for="prenom">
                                <p>Prénom :</p>
                            </label></td>
                        <td> <input type="text" id="prenom" name="prenom" class="for1"
                                placeholder=" Entrez votre prénom" required><br></td>
                    </tr>

                    <tr>
                        <td> <label for="email">
                                <p>Email :</p>
                            </label></td>
                        <td><input type="text" id="email" name="email" class="for1" placeholder="Entrez votre email"
                                required><br></td>
                    </tr>
                </table>
            </div>


            <div class="col-md-4 offset-md-1">
                <table>
                    <tr>
                        <td> <label for="objet">
                                <p>Objet :</p>
                            </label></td>
                        <td> <input type="text" id="objet" name="objet" class="for1" required><br></td>
                    </tr>

                    <tr>
                        <td> <label for="message">
                                <p>Message :</p>
                            </label></td>
                        <td> <textarea rows="3" cols="50" id="message" name="message"></textarea></td>
                    </tr>
                </table>
            </div>


        </div>


        <br><br>
        <button class="boutton1" type="submit"> Envoyer</button>
    </form>
    <br><br>

</section>