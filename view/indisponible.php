<!-- <?php
        ?>

<p> cette page n'est malheureusement pas disponible </p>



<form method="post" action="index.php?controller=client&action=connect">
    <button class="" type="submit">Connexion</button>
</form>

<form method="post" action="index.php?controller=client&action=create">
    <button class="" type="submit">inscription</button>
</form>




<?php

?> -->




<?php if (!isset($_SESSION['idClient'])) { ?>


<section class="bloc_connexion"><br>
    <div class="alert alert-danger" role="alert">
        <h5 class="text-center"> <i class="fa fa-exclamation-triangle"> </i> Cette page n’est pas disponible
        </h5>
    </div>

    <h3 class="titre1">Connexion </h3>
    <div class="bloc2"></div> <br><br>

    <?php if (isset($_SESSION['flash'])) { ?>
    <?php foreach ($_SESSION['flash'] as $type => $message) { ?>


    <!-- Affichage la msg de succes -->
    <div class="alert alert-danger" role="alert">
        <?= $message; ?>
    </div>
    <?php } ?>
    <?php unset($_SESSION['flash']);
        } ?>



    <div class="row">


        <div class="col-md-4 offset-md-4">
            <form action="index.php?controller=client&action=connected" method="POST">
                <div class="form-group input-group-sm">
                    <!-- <label for="exampleInputEmail1">Adresse e-mail</label> -->
                    <input type="email" class="form-control" id="email" name="email" required
                        placeholder="Adresse e-mail" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group input-group-sm">
                    <!-- <label for="exampleInputPassword1">Mot de passe</label> -->
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
                </div>

                <button type="submit" class="cnxBtnC ">Connexion</button><br><br>

                <p> Vous n’avez pas de compte ? <a href="index.php?controller=client&action=create"> Inscrivez-vous
                    </a>
                </p>
            </form>
        </div>


    </div>
</section> <?php } else  header("Location: index.php?controller=client&action=profil"); ?>