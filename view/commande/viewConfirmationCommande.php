<div class="commandeConf">
    <br>
    <h3 class="titre1"> confirmation la commande </h3>
    <div class="bloc2"></div> <br><br>
    <form method="post" action="index.php?controller=commande&action=insert">
        <div class="row">




            <div class="col-md-4 offset-md-4 conBloc">

                <?php echo "Nombre d'heure :   <b> " . $nbrHeure . "</b>";
                echo "<br> <br>Date commande :   <b>" . $dateCommande . "</b>";
                echo "<br> <br> heure de debut :  <b> " . $heureDebut . "</b>";
                $prixTotal = $nbrHeure * ($tab->getPrixHeure());
                echo " <br> <br> Prix total :  <b>" . $prixTotal . "  Dinars    </b>";
                ?>
                <br><br> <br> <button class="btnCmd" type="submit" onclick="test()">confirmer la
                    commande</button><br><br>
            </div>



        </div>
    </form>
</div>