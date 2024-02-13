<?php

class ApiMovementDAL
{
	function __construct()
    {
    }

	function movementTest($board, $fromColumn, $fromRow, $toColumn, $toRow)
	{
		$url = "https://localhost:7246/Movement?board=".$board."&fromColumn=".$fromColumn."&fromRow=".$fromRow."&toColumn=".$toColumn."&toRow=".$toRow;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,4);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$json = curl_exec($ch);
		//var_dump($response);
		if (!$json)
		{
			echo curl_error($ch);
		}
		curl_close($ch);
		$x = json_decode($json,true);
		// var_dump($x);
		return $x;
	}
}
?>