<?php

require ("../Negocio/playersBL.php");

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $nameBL = new PlayersBL();
    $profile =  $nameBL->verify($_POST['name'],$_POST['passw']);

    if ($profile==="premium" || $profile==="normal")
    {
        session_start(); //inicia o reinicia una sesión
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['profile'] = $profile;
        header("Location: index.php");
    }
    else
    {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>


    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for = "name"> Usuario: </label>
        <input id="name" name = "name" type = "text">
        <br>
        <label for = "name"> Contraseña: </label>
        <input id = "passw" name = "passw" type = "password" minlength="8">
        <br>
        <input type = "submit" value="Log in">
    </form>

    <div class='error'>
    <?php
        if (isset($error))
        {
            print("<h3>El usuario ".$_POST['name']." no tiene acceso</h3>");
        }
    ?>
    </div>
</body>
</html>