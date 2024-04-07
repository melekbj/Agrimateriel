<div class="blocAdminAdmin">
    <h5>Liste des administrateurs</h5>

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
        <a href='index.php?controller=administrateur&action=create' class="btnAjAdm"><i class="fa fa-plus"></i> Ajouter
            un administrateur</a>
    </div>
    <br>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"># Id</th>
                <th scope="col">Nom </th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tabl as $ad) { ?>
            <tr>
                <th scope="row"> <?php echo $ad->getIdAdmin(); ?></th>
                <td><?php echo $ad->getNomAdmin(); ?></td>
                <td> <?php echo $ad->getPrenomAdmin(); ?></td>
                <td> <?php echo $ad->getEmailAdmin(); ?> </td>
                <td> <?php $idAdmin = $ad->getIdAdmin(); ?>
                    <?php echo " <a  class='mobtnAdmini' href='index.php?controller=administrateur&action=update&idAdmin=$idAdmin'><i class='fa fa-edit'></i>  Modifier </a> &nbsp
    <a class='supbtnAdmini' href='index.php?controller=administrateur&action=delete&idAdmin=$idAdmin'> <i class='fa fa-trash'></i>  Supprimer </a>"; ?>
                </td>
            </tr>

            <?php  }   ?>

        </tbody>
    </table>



</div>