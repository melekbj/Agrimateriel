<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> AGRICULTURE</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="JS/script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <header>
        <!-------------------------------------------------------- Top header --------------------------------->
        <div class="topbar">
            <div class="row">
                <div class="col-6 text-left">
                    <p><i class="fa fa-phone"></i> 71 552 995 &nbsp; &nbsp;
                        <i class="fa fa-envelope"></i> contact@agrimatriel.com</p>
                </div>
                <div class="col-5 text-right">
                    <ul class="list-inline">
                        <!-- si l'utilisateur connectée  -->
                        <?php if (isset($_SESSION['idClient'])) { ?>
                        <li class="dropdown ">
                            <a class="dropdown-toggle af" href="#" type="button" data-toggle="dropdown">
                                <i class="fas fa-user"></i> <?php echo $_SESSION['prenom'] . "  " ?>
                                <?php echo $_SESSION['nom'] ?> </a>
                            <div class="dropdown-menu">
                                <a class="item-d" href='index.php?controller=client&action=profil'>Mon profil</a>
                                <a class="item-d" href='index.php?controller=client&action=deconnexion'>Déconnexion</a>
                                <br>
                            </div>
                        </li>
                        <?php
                        } else { ?>
                        <!-- si l'utilisateur  n'est pas connectée connectée  -->
                        <i class="fas fa-user usi"></i> <a class="conx"
                            href="index.php?controller=client&action=connect">
                            Connexion </a> |
                        <a class="conx" href="index.php?controller=client&action=create"> Inscription </a>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-------------------------------------------------------- Menu principal --------------------------------->
        <div class="bloc1">
            <div class="row">
                <div class="col-md-3 offset-md-0 colz ">
                    <div class="logo">
                        <p><a class="logo-a"
                                href="index.php?controller=client&action=accueil"><span>Agri-</span>Matériel</a></p>
                    </div>
                </div>
                <div class="col-md-5 offset-md-0 colz " align="right">
                    <nav>
                        <ul>
                            <li><a class="lien" href="index.php?controller=client&action=accueil">Accueil</a></li>
                            <li><a class="lien" href="index.php?controller=client&action=apropos"> A propos </a></li>
                            <li><a class="lien" href="index.php?controller=annonceMateriel&action=readAll">
                                    Matériels</a></li>
                            <li><a class="lien" href="index.php?controller=contact&action=create">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-2 offset-md-0 colz">
                    <form class="annonce">
                        <a href="index.php?controller=annonceMateriel&action=create">
                            <button type="button" class="annonc"> <i class="fas fa-plus"></i> &nbsp; Créer votre annonce
                            </button> </a>
                    </form>
                </div>
            </div>
        </div>
    </header>