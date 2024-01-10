<?php
ini_set('display_errors','On');
ini_set('html_errors', 0);
require("../Infraestructura/matchesDAL.php");

class MatchesBL
{
    private $_ID;
    private $_Title;
    private $_White;
    private $_Black;
    private $_StartDate;
    private $_EndDate;
    private $_Winner;
    private $_State;

    function __construct()
    {
    }

    function init($id,$title,$white,$black,$startDate,$endDate,$winner,$state)
    {
        $this->_ID = $id;
        $this->_Title = $title;
        $this->_White = $white;
        $this->_Black = $black;
        $this->_StartDate = $startDate;
        $this->_EndDate = $endDate;
        $this->_Winner = $winner;
        $this->_State = $state;
    }

    function getID()
    {
        return $this->_ID;
    }
    function getTitle()
    {
        return $this->_Title;
    }
    function getWhite()
    {
        return $this->_White;
    }
    function getBlack()
    {
        return $this->_Black;
    }
    function getStartDate()
    {
        return $this->_StartDate;
    }
    function getEndDate()
    {
        return $this->_EndDate;
    }
    function getWinner()
    {
        return $this->_Winner;
    }
    function getState()
    {
        return $this->_State;
    }

    function obtainMatchData()
    {
        $matchesDAL = new MatchesDAL();
        $rs = $matchesDAL->obtainMatchData();
		$matchesList =  array();
        foreach ($rs as $match)
        {
            $oMatchesBL = new MatchesBL();
            $oMatchesBL->Init($match['ID'],$match['title'],$match['white'],$match['black'],$match['startDate'],$match['endDate'],$match['winner'],$match['state']);
            array_push($matchesList,$oMatchesBL);
        }
        
        return $matchesList;
    }

    function insertMatchData($title,$white,$black)
    {
        // Se registra la fecha actual como la fecha de inicio.
        $startDate = date('"Y-m-d H:i:s"');

        $matchesDAL = new MatchesDAL();
        $matchesDAL->insertMatchData($title,$white,$black,$startDate);
    }
}

?>