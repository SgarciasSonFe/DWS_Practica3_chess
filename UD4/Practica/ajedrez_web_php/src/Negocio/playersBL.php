<?php
require("../Infraestructura/playersDAL.php");

class PlayersBL
{
    private $_ID;
    private $_Name;

    function __construct()
    {
    }

    function init($id,$name)
    {
        $this->_ID = $id;
        $this->_Name = $name;
    }

    function getID()
    {
        return $this->_ID;
    }
    function getName()
    {
        return $this->_Name;
    }

    function obtainPlayerData()
    {
        $playersDAL = new PlayersDAL();
        $rs = $playersDAL->obtainPlayerData();
		$playersList =  array();
        foreach ($rs as $player)
        {
            $oPlayersBL = new PlayersBL();
            $oPlayersBL->Init($player['ID'],$player['name']);
            array_push($playersList,$oPlayersBL);
        }
        
        return $playersList;
    }

    function verify($name, $passw)
    {
        $namesDAL = new PlayersDAL();
        $res = $namesDAL->verify($name,$passw);
        
        return $res;
        
    }

}

?>