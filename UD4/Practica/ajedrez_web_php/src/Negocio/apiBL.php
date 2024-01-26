<?php
ini_set('display_errors','On');
ini_set('html_errors', 0);
require("../Infraestructura/apiDAL.php");

class ApiBL
{
    function __construct()
    {
    }

    function boardTest($board)
	{
        $x = new ApiDAL();
        $rs = $x->boardTest($board);
        return $rs;
    }
}
?>