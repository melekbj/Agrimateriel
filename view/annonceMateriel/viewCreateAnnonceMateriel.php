<?php

if (isset($_SESSION['idClient'])) { ?>

<article>
    <div class="formulaire">
        <br>
        <h3 class="titre1"> Créer votre annonce </h3>
        <div class="bloc2"></div> <br><br>
        <!-- ????????????????????????????????????? -->
        <div class="col-md-5 offset-md-4">
            <form name="inscritAnnonce" method="POST" action="index.php?controller=annonceMateriel&action=created"
                enctype="multipart/form-data">
                <div class="form-group input-group-sm">

                    <table>
                        <tr>
                            <td> <label for="nom">
                                    <p>Nom Matériel :</p>
                            </td>
                            <td> <input type="text" class="ch1" id="nom" name="nom" placeholder="Nom de matériel">
                                </label>
                                <div id="divNom" style=" color:black; size:150px"></div>
                            </td>
                        </tr>

                        <tr>
                            <td> <label for="categorie">
                                    <p> Catégories </p>
                                </label> </td>
                            <td> <select name="categorie" class="ch2" required id="categorie">
                                    <option value="selection" selected> Séléctionner une catégories </option>
                                    <option value="tracteurs"> Tracteurs</option>
                                    <option value="moissonneuses-batteuses">Moissonneuses-batteuses</option>
                                    <option value="ensileuses"> Ensileuses</option>
                                    <option value="recolteuses">Récolteuses à betteraves et pommes de terre</option>
                                    <option value="faucheuses">Faucheuses</option>
                                    <option value="presses">Presses</option>
                                    <option value="sol">Outils de travail du sol</option>
                                    <option value="manutention"> Engins de manutention </option>
                                </select>
                                <div id="divCateg" style=" color:black; size:150px"></div>

                            </td>
                        </tr>

                        <tr>
                            <td valign="top"> <label for="description">
                                    <p>Description :</p>
                                </label></td>
                            <td> <textarea rows="4" cols="35" class="ch3" required id="description" name="description"
                                    placeholder="Description"></textarea>
                                <div id="divDescrip" style=" color:black; size:150px"></div>
                            </td>
                        </tr>





                        <tr>
                            <td> <label for="adresse">
                                    <p> Ville : </p>
                                </label> </td>
                            <td> <select name="adresse" class="ch2" id="adresse">
                                    <option value="selection"> Séléctionner une ville </option>
                                    <option value="tunis">Tunis</option>
                                    <option value="ariana">Ariana</option>
                                    <option value="beja">Béja</option>
                                    <option value="bizerte">Bizerte</option>
                                    <option value="manouba">La Manouba</option>
                                    <option value="gabes">Gabes</option>
                                    <option value="mahdia">Mahdia</option>
                                    <option value="nabeul">Nabeul</option>
                                    <option value="dfax">Sfax</option>
                                    <option value="siliana">Siliana</option>
                                    <option value="kairouan">Kairouan</option>
                                    <option value="kef">kef</option>
                                    <option value="jandouba">jandouba</option>
                                    <option value="sousse"> sousse</option>
                                    <option value="sidibouzid "> Sidi bouzid</option>
                                </select>
                                <div id="divAdresse" style=" color:black; size:150px"></div>

                            </td>
                        </tr>

                        <tr>
                            <td> <label for="prixHeure">
                                    <p> Prix par heure</p>
                            </td>
                            <td> <input type="number" class="ch1" id="prixHeure" name="prixHeure" placeholder="Prix">
                                </label>
                                <div id="divPrix" style=" color:black; size:150px"></div>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <p>Téléchargez photo </p>
                            </td>
                            <td> <input type="file" name="photo" id="photo" required /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right"><button class="btnCreer" type="submit" class="bttn"
                                    onclick="verif_annonce()"> Envoyer
                                </button></td>
                        </tr>

                    </table>
                    <br>
                    <div>

                    </div>

                </div>
            </form>
        </div>
    </div>
</article>

<?php } else   require_once("{$ROOT}{$DS}view{$DS}indisponible.php");
?>