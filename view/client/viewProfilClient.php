<?php if (isset($_SESSION['idClient'])) { ?>


<div class="pageProfil">

    <!--***************************** les messages succès  ***************-->
    <?php if (isset($_SESSION['flash'])) { ?>
    <?php foreach ($_SESSION['flash'] as $type => $message) { ?>
    <!-- Affichage la msg de succes -->
    <div class="alert alert-success" role="alert">
        <?= $message; ?>
    </div>
    <?php } ?>
    <?php unset($_SESSION['flash']);
        } ?>
    <!--***************************** ends messages succès  ***************-->



    <!--***************************** les messages erreur ***************-->


    <?php if (isset($_SESSION['erreur'])) { ?>
    <?php foreach ($_SESSION['erreur'] as $type => $message) { ?>


    <!-- Affichage la msg de errr -->
    <div class="alert alert-danger" role="alert">
        <?php echo '<i class="fa fa-times"></i>  ' . $message; ?>
    </div>
    <?php } ?>
    <?php unset($_SESSION['erreur']);
        } ?>
    <!--***************************** ends messages ererur ***************-->


    <!--*************************** Bloc Profil************************** -->
    <div class="container">
        <br>
        <div class="blocProfil">

            <p class="imgUser"><i class="fa fa-user"></i> </p>
            <h6> <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']  ?> </h6>
            <h5> <?php echo  $_SESSION['sexe']; ?></h5>

            <div class="row">
                <div class="col-5  text-right">
                    <i class="fa fa-phone"> &nbsp; <?php echo $_SESSION['telephone']; ?> </i>
                </div>
                <div class="col-5">
                    &nbsp; &nbsp; <i class="fa fa-envelope">
                        &nbsp; <?php echo $_SESSION['emailClient']; ?> </i>
                </div>
            </div><br>
            <?php $idClient = $_SESSION['idClient']; ?>
            <button type="button" class="modifProfilbtn" class="" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo" href='index.php?controller=client&action=update&idClient=<?= $idClient ?>'> <i
                    class='fa fa-edit'> </i> Modifier</button>
        </div>
    </div> <!-- ends  container Bloc Profil -->
    <!--***************************ends Bloc Profil************************** -->



    <!-- bloc modifier Profil -->
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier les informations personnel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="inscri" method="POST"
                            action="index.php?controller=client&action=updated&idClient=<?= $idClient ?>">
                            <table>
                                <tr>
                                    <td>

                                        <label for="nom" class="col-form-label">Nom : </label>
                                    </td>
                                    <td> <input type="text" class="ch1" id="nom" name="nom" required
                                            value="<?php echo $_SESSION["nom"]; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>

                                        <label for="prenom" class="col-form-label"> Prénom : </label>
                                    </td>
                                    <td>
                                        <input type="text" class="ch1" id="prenom" name="prenom" required
                                            value="<?php echo $_SESSION["prenom"]; ?>">

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="sexe">
                                            Sexe :
                                        </label>
                                    </td>
                                    <td>
                                        <?php if ($_SESSION['sexe'] == 'Homme') { ?>
                                        <input type="radio" name="sexe" id="sexe" value="Homme" checked /> Homme
                                        <input type="radio" name="sexe" id="sexe" value="Femme" /> Femme
                                        <?php } else { ?>

                                        <input type="radio" name="sexe" value="Homme">Homme
                                        <input type="radio" name="sexe" value="Femme" checked>Femme

                                        <?php  } ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td>


                                        <label for="emailClient" class="col-form-label"> Email : </label>
                                    </td>
                                    <td>
                                        <input type="email" required class="ch1" id="emailClient" name="emailClient"
                                            value="<?php echo $_SESSION["emailClient"]; ?>">

                                    </td>
                                </tr>

                                <tr>
                                    <td>


                                        <label for="telephone" class="col-form-label"> Telephone: </label>
                                    </td>
                                    <td>
                                        <input type="number" required class="ch1" id="telephone" name="telephone"
                                            value="<?php echo $_SESSION["telephone"]; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>

                                        <label for="mdcClient" class="col-form-label"> Mot de passe: &nbsp;&nbsp;&nbsp;
                                        </label>
                                    </td>
                                    <td>
                                        <input type="password" class="ch1" placeholder="Mot de passe"
                                            id="recipient-name" required name="mdpClient">
                                    </td>
                                </tr>

                                <tr>
                                    <td> </Td>
                                    <tD align="right">
                                        <br>
                                        <!-- <button type="reset" class="btn btn-secondary"
                                            data-dismiss="modal">Annuler</button> -->
                                        <button type="submit" class="modifProfilbtn"> <i class='fa fa-edit'> </i>
                                            Modifier</button>

                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ends bloc modifier profil -->






    <!-- Bloc    annonces & cmd -->
    <div class="container">
        <div class="row">

            <!--********************************** bloc annonce *********************-->
            <div class="col-5 blocAnnonceProfil">
                <h6> <i class="fa fa-bullhorn" aria-hidden="true"></i> Mes Annonces </h6>
                <hr>

                <?php foreach ($tab as $a) { ?>
                <div class="row">
                    <div class="col-4">
                        <img src="./image/uploads/<?php echo $a->getPhoto(); ?>" height="140" width="180">
                    </div>
                    <div class="col-5">
                        <?php
                                echo " <p> <p class='dtCmd' > <i class='fa fa-clock '></i>" . $a->getDateAjout();
                                echo " <p class='nomCmd' >  " . $a->getNomMateriel() . "</p>";
                                echo " <p class='caCmd' > Catégorie: " . $a->getCategories() . "</p>";
                                echo " <p class='desCmd' > " . $a->getDescription() . "</p>";
                                echo " <p class='adr' > <i class='fas fa-map-marker-alt'></i>  " . $a->getAdresse() . "    ";

                                echo "  &nbsp; &nbsp;  &nbsp; Prix : " . $a->getPrixHeure() . " Dt/h"; ?>

                    </div>
                </div>
                <?php $idMateriel = $a->getIdMateriel(); ?>
                <?php echo "<div class= 'updt'>
 		                 <a class='btnModAnnonce' href='index.php?controller=annonceMateriel&action=update&idMateriel=$idMateriel'> <i class='fa fa-edit'> </i> Modifier </a>";
                        ?>
                <button type="button" class="btnModAnnonce" data-toggle="modal"
                    data-target="#suppModel<?= $idMateriel ?>"
                    href='index.php?controller=annonceMateriel&action=delete&idMateriel=<?php $idMateriel ?>'> <i
                        class="fa fa-trash"></i>
                    Supprimer
                </button>




                <?php echo "</div>"; ?>


                <!-- pop up suppression  -->
                <div class="modal" tabindex="-1" role="dialog" id="suppModel<?= $idMateriel ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmer la suppression </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post"
                                action="index.php?controller=annonceMateriel&action=delete&idMateriel=<?= $idMateriel ?>">
                                <div class="modal-body">
                                    <p>Vous voulez vraiment supprimer cette annonce ?
                                        <?= $idMateriel; ?>
                                    </p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Supprimer </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>

                <?php   } ?>
            </div>
            <!--***************** ends bloc anonce ******************************-->




            <!--************************* bloc commande ***********************-->
            <div class="col-5 blocCommandeProfil">
                <h6> <i class='fas fa-clipboard-check'></i> Mes Commandes </h6>
                <hr>
                <?php foreach ($tab_commande as $com) {

                        echo " <p class='' > Date de commande : " . $com->getDateCommande() . "</p>";
                        echo " <p class='' >Heure de début : " . $com->getHeureDebut() . "</p>";

                        echo " <p class='' > Nombre d'heure :" . $com->getNbrHeure() . "</p>";
                        echo " <p class='' > Prix Total : " . $com->getPrixTotal() . "</p>";
                        echo " <p class='' > Nom de matériel : " . $com->getNomMateriel() . "</p>";

                    ?>
                <img src="./image/uploads/<?php echo $com->getPhoto(); ?>" height="140" width="180">
                <hr>
                <?php
                    } ?>
            </div>
            <!--**************** ends bloc commande ************************-->





        </div> <!-- ends row container -->

    </div> <!-- ends container ann & cmd-->

</div> <!-- ends page profil -->





<?php      } else
    require_once("{$ROOT}{$DS}view{$DS}indisponible.php")
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>