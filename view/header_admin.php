<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Administrateur AGRICULTURE </title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="JS/script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <header>
        <!--menu -->
        <?php if (isset($_SESSION['idAdmin'])) { ?>






        <div class="menuAdmin">

            <div class="logo">
                <p class="logo-a"><span>Agri-</span>Matériel
                </p>
            </div>

            <p class="imgUser"><i class="fa fa-user"></i> </p>
            <h6> <?php echo $_SESSION['nomAdmin'] . " " . $_SESSION['prenomAdmin']  ?> </h6>



            <a href="index.php?controller=client&action=readAll&admin=1">Gestion des clients </a><br>
            <a href="index.php?controller=annonceMateriel&action=readAll&admin=1">Gestion des annonces </a><br>
            <a href="index.php?controller=contact&action=readAll&admin=1">Gestion des contacts </a><br>
            <a href="index.php?controller=administrateur&action=readAll">Gestion des administrateurs </a><br>
            <a href='index.php?controller=administrateur&action=deconnexion'>Déconnexion</a>




        </div>

        <?php } else {
            require_once("{$ROOT}{$DS}view{$DS}administrateur{$DS}viewConnectAdministrateur.php");
        } ?>
        <!--topbar-->
        <div class="topbarAdmin">
            <h5 class="text-center">Espace Administrateur</h5>
        </div>
    </header>





    <?php if (isset($_SESSION['idAdmin'])) { ?>





    <br>
    <?php  } else {
        require_once("{$ROOT}{$DS}view{$DS}administrateur{$DS}viewConnectAdministrateur.php");
    } ?>