<?php if (!isset($_SESSION['idAdmin'])) { ?>





<section class="bloc_connexionAdmin"><br><br><br>


    <h3 class="titre1">
        <p><a class="logo-a" href=""><span>Agri-</span>Matériel </a></p>
    </h3>


    <div class="bloc2"></div> <br><br><br>

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
            <form action="index.php?controller=administrateur&action=connected" method="POST">
                <div class="form-group input-group-sm">

                    <input type="email" required placeholder="Adresse e-mail" class="form-control" id="email"
                        name="email" required aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group input-group-sm">

                    <input type="password" class="form-control" placeholder="Mot de passe" id="mdp" name="mdp" required>
                </div>

                <button type="submit" class="cnxBtnCAd">Connexion</button><br><br>
            </form>
            <!-- <p> Vous n’avez pas de compte ? <a href="index.php?controller=administrateur&action=create">Inscrivez-vous
                </a></p> -->

        </div>


    </div>
</section>
<?php } ?>