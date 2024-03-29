<?php

class BoardStatusDAL
{
    function __construct()
    {
    }

    function obtainBoardStatus($idMatch)
    {
        $connection = mysqli_connect('localhost','root','1234');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
		
 		mysqli_select_db($connection, 'chess_game');

		$consult = mysqli_prepare($connection, "SELECT ID,board FROM T_Board_Status WHERE IDGame = ".$idMatch);
        $consult->execute();
        $result = $consult->get_result();

        $BoardStatus =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($BoardStatus,$myrow);
        }
		return $BoardStatus;
    }

    function insertBoardStatus($board, $idMatch)
    {
        $connection = mysqli_connect('localhost','root','1234');
        if(mysqli_connect_errno())
        {
            echo "Error al conectar a MySQL: ". mysqli_connect_error();
        }
        mysqli_select_db($connection, 'chess_game');

        $insert = mysqli_prepare($connection, "insert into T_Board_Status (IDGame,board) values ((select ID from T_Matches where ID = ".$idMatch."),'".$board."');");
        $insert->execute();
    }
}
?>