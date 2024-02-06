<?php
ini_set('display_errors','On');
ini_set('html_errors', 0);
require("../Infraestructura/apiMovementDAL.php");

class ApiMovementBL
{
    function __construct()
    {
    }

    function movementTest($board, $fromColumn, $fromRow, $toColumn, $toRow)
	{
        $x = new ApiMovementDAL();
        $rs = $x->movementTest($board, $fromColumn, $fromRow, $toColumn, $toRow);
        return $rs;
    }
}
?>