<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href='./CSS/stylesheet.css' />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title><?php echo $pagetitle; ?> </title>
</head>

<body>
    <?php

    if (isset($_GET['admin']) && $_GET['admin'] == 1) {
        require_once("{$ROOT}{$DS}view{$DS}header_admin.php");


        $filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}"; //hedhi yod5el ldossier controller(client) 

        // détermine le chemin de la vue en fonction du controller qu'on utilise
        $filepath = $ROOT . $DS . "view" . $DS . $controller . $DS;
        $filename = "view" . ucfirst($view) . ucfirst($controller) . 'Admin' . '.php'; // détermine le nom du fichier
        require_once($filepath . $filename);

        require_once("{$ROOT}{$DS}view{$DS}footer_admin.php");
    } else if ($controller == "administrateur") {

        require_once("{$ROOT}{$DS}view{$DS}header_admin.php");


        $filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}"; //hedhi yod5el ldossier controller(client) 

        // détermine le chemin de la vue en fonction du controller qu'on utilise
        $filepath = $ROOT . $DS . "view" . $DS . $controller . $DS;
        $filename = "view" . ucfirst($view) . ucfirst($controller) . '.php'; // détermine le nom du fichier
        require_once($filepath . $filename);

        require_once("{$ROOT}{$DS}view{$DS}footer_admin.php");
    } else {

        require_once("{$ROOT}{$DS}view{$DS}header.php");

        $filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}"; //hedhi yod5el ldossier controller(client) 

        // détermine le chemin de la vue en fonction du controller qu'on utilise
        $filepath = $ROOT . $DS . "view" . $DS . $controller . $DS;
        $filename = "view" . ucfirst($view) . ucfirst($controller) . '.php'; // détermine le nom du fichier
        require_once($filepath . $filename);



        require_once("{$ROOT}{$DS}view{$DS}footer.php");
    }
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