<?php if (isset($_SESSION['idAdmin'])) { ?>
<div class="blocContactAdmin">

    <h5> Liste des Contacts </h5><br> </br>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Nom et Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Objet</th>
                <th scope="col">Message</th>
                <th scope="col">Date d'ajout</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab_contact as $c) { ?>
            <tr>
                <th scope="row"> <?php echo $c->getidContact(); ?></th>
                <td><?php echo $c->getNom() . " " . $c->getPrenom(); ?></td>

                <td> <?php echo  $c->getEmail(); ?></td>
                <td><?php echo  $c->getObjet(); ?></td>
                <td><?php echo  $c->getMessage(); ?></td>
                <td><?php echo  $c->getDateAjout(); ?></td>
            </tr>
            <?php   }
            } ?>

        </tbody>
    </table>




</div>