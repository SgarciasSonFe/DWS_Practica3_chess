<?php
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