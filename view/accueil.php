<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href='./CSS/stylesheet.css' />
    <title>Accueil </title>
</head>

<body>
    <?php require_once("{$ROOT}{$DS}view{$DS}header.php");  ?>
    <!---------- caroussel---------->

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/image1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-sm-block carl">
                    <h3>MATERIELS AGRICULTURE : COMMANDEZ AU MEILLEUR PRIX !</h3>
                    <p>Nos agents sont à votre disposition dans toute la Tunisie Louer des matériels agricole en ligne
                        en Tunisie
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/imaage3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-sm-block carl">
                    <h3>MATERIELS AGRICULTURE : COMMANDEZ AU MEILLEUR PRIX !</h3>
                    <p>Nos agents sont à votre disposition dans toute la Tunisie Louer des matériels agricole en ligne
                        en Tunisie
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/imaage2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-sm-block carl">
                    <h3>MATERIELS AGRICULTURE : COMMANDEZ AU MEILLEUR PRIX !</h3>
                    <p>Nos agents sont à votre disposition dans toute la Tunisie Louer des matériels agricole en ligne
                        en Tunisie
                    </p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>







    <!---------------- page apropos --------------->
    <section id="propos">

        <br>
        <h3 class="titre1">À propos</h3>
        <div class="bloc2"></div> <br>
        <div class="parag2">
            <p> Agri-Matériel est un site d'annonces dédié à location de matériel agricole.</p>
            <p> Agri-Matériel annonces de matériel agricole à louer , en ligne actuellement.</p>
            <p>Sur notre site, retrouvez l'ensemble des gammes de matériel de toutes les marques agricoles.</p>
            <p> Si vous êtes à la recherche d’un motoculteur, d’un tracteur John Deere,d’une moissonneuse Claas ou
                encore d’une tondeuse Husqvarna
            </p>
            <p>naviguez sur Agri-Matériel et trouvez le matériel qu’il vous faut.
            </p><br>
        </div>

        <img class="iconetracteur" src="image/tractor.png" alt="logo_tracteur">
        <div class="parag2">
            <p> Louez un matériel agricole au TOP quand vous en avez besoin !
            </p>
            <p> Plus de 1 000 matériels disponibles à la location près de chez vous </p>
            <p> Réservez en quelques clics votre matériel</p>
        </div>
        <br><br>

    </section>





    <!--------------- galerie -------------->
    <section class="materiel"> <br>

        <h3 class="titre1">Matériels</h3>
        <div class="bloc2"></div> <br>
        <div class="galerie">
            <img src="image/tracteur1.jpg" alt="telescopique">
            <p> Tracteurs </p>
        </div>

        <div class="galerie">
            <img src="image/récolte.jpg" alt="récolte">
            <p> Matériel de récolte </p>
        </div>

        <div class="galerie">
            <img src="image/sémoire.jpg" alt="semoirs">
            <p> Sémoirs </p>
        </div>

        <div class="galerie">
            <img src="image/Pulvérisateur.jpeg" alt="Pulverisateurs">
            <p> Pulvérisateurs </p>
        </div>

        <div class="galerie">
            <img src="image/outil_animé.jpg" alt="outil_du_sol_animé">
            <p> Outil du sol animé </p>
        </div>

        <div class="galerie">
            <img src="image/outil_nonaminé.jpg" alt="outil_du_sol_non_animé">
            <p> Outil du sol non animé </p>
        </div>

        <br><br>
        <div>

            <form method="post" action="index.php?controller=annonceMateriel&action=readAll">

                <button class="boutton1" type="submit">Louer maintenant</button>
            </form>

        </div>
    </section>





    <!--------------- page contact -------------->
    <br>
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


    </section>


    <?php
    require_once("{$ROOT}{$DS}view{$DS}footer.php");
    ?>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>