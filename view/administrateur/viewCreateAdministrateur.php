<div class="blocContactAdmin">



    <h5> Ajouter un administrateur </h5><br> </br>
    <form method="post" action="index.php?controller=administrateur&action=created">


        <table>
            <tr>
                <td>

                    <label for="idAdmin"> Code :</label> </td>
                <td>
                    <input type="number" id="idAdmin" name="idAdmin" required class="ch1" placeholder="Code">
                </td>
            </tr>
            <tr>
                <td>


                    <label for="nomAdmin">Nom :</label> </td>
                <td>

                    <input type="text" id="nomAdmin" name="nomAdmin" required class="ch1" placeholder="Nom">

                </td>
            </tr>
            <tr>
                <td>

                    <label for="prenomAdmin">Prenom :</label> </td>
                <td>
                    <input id="prenomAdmin" name="prenomAdmin" required class="ch1" placeholder="Prenom">
                </td>
            </tr>
            <tr>
                <td>


                    <label for="emailAdmin">e-mail :</label> </td>
                <td>
                    <input type="email" id="emailAdmin" name="emailAdmin" required class="ch1" placeholder="Email">
                </td>
            </tr>
            <tr>
                <td>


                    <label for="mdpAdmin">Mot de passe :</label> </td>
                <td>
                    <input type="password" id="mdpAdmin" name="mdpAdmin" required class="ch1"
                        placeholder="Mot de passe">
                </td>
            </tr>
            <tr>
                <td> </td>
                <td>

                    <br>
                    <div>
                        <button class="btnCAdminAdm" type="submit"> Créer </button>
                    </div>
                </td>
            </tr>
        </table>

    </form>
    </br></br>

</div>