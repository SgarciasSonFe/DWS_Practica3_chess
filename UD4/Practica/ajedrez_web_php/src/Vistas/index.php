<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de bienvenida</title>
    <link rel="stylesheet" href="../../css/index.css">

</head>
<body>
    <?php
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['name']))
        {
            header("Location: login.php");
        }
    ?>

    <header>
        <?php echo "<h1>Bienvenido: ".$_SESSION['name']."</h1>"; ?>
        <h1>Juguemos al ajedrez</h1> 
    </header>  
    <div id="content">
        <nav>
            <ul>
                <a class="menu" href="new_gameView.php">
                    <li class="link"> Nueva partida </li>
                </a>

                <?php
                if($_SESSION['profile'] == "premium")
                {
                    echo "<a class='menu' href='gameListView.php'>
                            <li class='link'> Lista de partidas </li>
                        </a>";
                }
                ?>
                
                <a id="logout" href="logout.php"> Cerrar sesión </a>
            </ul>
        </nav>
    </div>
    
</body>
</html>