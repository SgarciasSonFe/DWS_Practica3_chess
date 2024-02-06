<?php
ini_set('display_errors','On');
ini_set('html_errors', 0);
require("../Infraestructura/apiScoreDAL.php");

class ApiScoreBL
{
    function __construct()
    {
    }

    function boardTest($board)
	{
        $x = new ApiScoreDAL();
        $rs = $x->boardTest($board);
        return $rs;
    }
}
?>