<?php
ini_set('display_errors','On');
ini_set('html_errors', 0);

class MatchesDAL
{
    function __construct()
    {
    }

    function obtainMatchData()
    {
        $connection = mysqli_connect('localhost','root','1234');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
		
 		mysqli_select_db($connection, 'chess_game');

		$consult = mysqli_prepare($connection, "SELECT ID,title,white,black,startDate,endDate,winner,state FROM T_Matches");
        $consult->execute();
        $result = $consult->get_result();

        $matches =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($matches,$myrow);
        }
		return $matches;
    }
    

    function insertMatchData($title,$white,$black,$startDate)
    {
        $connection = mysqli_connect('localhost','root','1234');
        if(mysqli_connect_errno())
        {
            echo "Error al conectar a MySQL: ". mysqli_connect_error();
        }
        mysqli_select_db($connection, 'chess_game');

        $insert = mysqli_prepare($connection, "INSERT INTO T_Matches (title,white,black,startDate) VALUES(\"".$title."\",".$white.",".$black.",".$startDate.");");        
        $insert->execute();
    }

}
?>