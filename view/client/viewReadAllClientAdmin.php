<?php if (isset($_SESSION['idAdmin'])) { ?>
<div class="blocClientAdmin">

    <h5> Liste des clients </h5>
    <?php if (isset($_SESSION['flash'])) { ?>
    <?php foreach ($_SESSION['flash'] as $type => $message) { ?>

    <!-- Affichage la msg de succes -->
    <div class="alert alert-success" role="alert">
        <?php echo '<i class="fa fa-check"></i>  ' . $message; ?>
    </div>
    <?php } ?>
    <?php unset($_SESSION['flash']);
        } ?>

    <div class='add text-right'>
        <a href='index.php?controller=client&action=create&admin=1' class="btnAjAdm"><i class="material-icons" style="font-size:36px">add_circle</i>Ajouter
            un client</a>
    </div>



    <br>
    <br>


    <table class="table">
        <thead>
            <tr>
                <th scope="col"># Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Sexe</th>
                <th scope="col">Email</th>
                <th scope="col">Télèphone</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab as $c) { ?>
            <tr>
                <th scope="row"><?php echo  $c->getIdClient();  ?></th>
                <td> <?php echo $c->getNom();  ?>
                </td>
                <td> <?php echo $c->getPrenom(); ?>
                </td>
                <td> <?php echo  $c->getSexe();  ?></td>
                <td><?php echo  $c->getEmailClient();  ?></td>
                <td> <?php echo  $c->getTelephone();  ?></td>
                <td>

                    <?php $idClient = $c->getIdClient();
                            echo " <a class='mobtnAdmini' href='index.php?controller=client&action=update&admin=1&idClient=$idClient'> <i class='fa fa-edit'></i> Modifier </a>   &nbsp
      <a class='supbtnAdmini' href='index.php?controller=client&action=delete&admin=1&idClient=$idClient'> <i class='fa fa-trash'></i> Supprimer </a>"; ?>

                </td>
            </tr>
            <?php }  ?>
        </tbody>
    </table>














</div>
<!-- ends blocClientAdmin -->
<?php } else {
    $view = "connect";
    require_once("{$ROOT}{$DS}view{$DS}view.php");
}  ?>