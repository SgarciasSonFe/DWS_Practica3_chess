<?php
ini_set('display_errors','On');
ini_set('html_errors', 0);
require("../Infraestructura/boardStatusDAL.php");

class BoardStatusBL
{
    private $_ID;
    private $_Board;

    function __construct() 
    {
    }

    function init($id,$board)
    {
        $this->_ID = $id;
        $this->_Board = $board;
    }

    function getID()
    {
        return $this->_ID;
    }
    function getBoard()
    { 
        return $this->_Board;
    }

    function obtainBoardStatus($idMatch)
    {
        $boardStatusDAL = new BoardStatusDAL();
        $rs = $boardStatusDAL->obtainBoardStatus($idMatch);
		$boardStatusList =  array();
        foreach ($rs as $boardStatus)
        {
            $oBoardStatusBL = new BoardStatusBL();
            $oBoardStatusBL->Init($boardStatus['ID'],$boardStatus['board']);
            array_push($boardStatusList,$oBoardStatusBL);
        }
        return $boardStatusList;
    }
}

?>