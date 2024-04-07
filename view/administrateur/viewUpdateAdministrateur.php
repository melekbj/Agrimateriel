<div class="blocContactAdmin">

    <form method="post" action="index.php?controller=administrateur&action=updated">
        <h5> Modifier un administrateur </h5><br> </br>
        <table>
            <tr>
                <td>
                    <label for="idAdmin"> Code :</label> </td>
                <td>
                    <input type="text" class="ch1" id="idAdmin" name="idAdmin" value="<?php echo $up->getIdAdmin(); ?> "
                        readonly>
                </td>
            </tr>
            <tr>
                <td>


                    <label for="nomAdmin">Nom :</label> </td>
                <td>
                    <input type="text" class="ch1" id="nomAdmin" name="nomAdmin"
                        value="<?php echo $up->getNomAdmin(); ?> ">
                </td>
            </tr>
            <tr>
                <td>


                    <label for="prenomAdmin">Prenom :</label> </td>
                <td>
                    <input id="prenomAdmin" class="ch1" name="prenomAdmin"
                        value="<?php echo $up->getPrenomAdmin(); ?> ">

                </td>
            </tr>
            <tr>
                <td>



                    <label for="emailAdmin">e-mail :</label> </td>
                <td>
                    <input type="email" class="ch1" id="emailAdmin" name="emailAdmin"
                        value="<?php echo $up->getEmailAdmin(); ?> ">
                </td>
            </tr>
            <tr>
                <td>

                    <label for="mdpAdmin">Mot de passe :</label> </td>
                <td>
                    <input type="password" class="ch1" id="mdpAdmin" name="mdpAdmin" placeholder="Mot de passe">
                </td>
            </tr>
            <tr>
                <td> </td>
                <td>

                    <br>
                    <div>
                        <button class="btnModAdminAdm" type="submit"> Modifier </button>
                    </div>
                </td>
            </tr>
        </table>


    </form>

</div>