
<?php
ini_set('display_errors','On');
ini_set('html_errors', 0);
require("./Infraestructura/playersDAL.php");

function test_alta_usuario()
{
    $u = new PlayersDAL();
    return $u->insert('luis','premium','lui@mail.com','11111111');
}

function test_verificar_usuario_encontrado()
{
    $perfil_esperado = 'premium';
    $u = new PlayersDAL();
    $perfil = $u->verify('luis','11111111');
    return $perfil === $perfil_esperado;
}


var_dump(test_alta_usuario());
var_dump(test_verificar_usuario_encontrado());