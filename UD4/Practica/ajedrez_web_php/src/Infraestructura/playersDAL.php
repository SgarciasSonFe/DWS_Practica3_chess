<?php

class PlayersDAL 
{
    function __construct()
    {
    }

    function obtainPlayerData()
    {
        $conexion = mysqli_connect('localhost','root','1234');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
		
 		mysqli_select_db($conexion, 'chess_game');

		$consulta = mysqli_prepare($conexion, "SELECT ID,name FROM T_Players");
        $consulta->execute();
        $result = $consulta->get_result();

        $players =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($players,$myrow);
        }
		return $players;
    }

    function insert($name,$profile,$email,$passw)
	{
		$conexion = mysqli_connect('localhost','root','1234');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		
        mysqli_select_db($conexion, 'chess_game');
		$consult = mysqli_prepare($conexion, "insert into T_Players(name,profile,email,password) values (?,?,?,?);");
        $hash = password_hash($passw, PASSWORD_DEFAULT);
        $consult->bind_param("ssss", $name,$profile,$email,$hash);
        $res = $consult->execute();
        
		return $res;
	}

    function verify($name,$passw)
    {
        $conexion = mysqli_connect('localhost','root','1234');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
        mysqli_select_db($conexion, 'chess_game');
        $consult = mysqli_prepare($conexion, "select name,profile,password from T_Players where name = ?;");
        $sanitized_name = mysqli_real_escape_string($conexion, $name);       
        $consult->bind_param("s", $sanitized_name);
        $consult->execute();
        $res = $consult->get_result();


        if ($res->num_rows==0)
        {
            return 'NOT_FOUND';
        }

        if ($res->num_rows>1) //El nombre de usuario debería ser único.
        {
            return 'NOT_FOUND';
        }

        $myrow = $res->fetch_assoc();
        $x = $myrow['password'];
        if (password_verify($passw, $x))
        {
            return $myrow['profile'];
        } 
        else 
        {
            return 'NOT_FOUND';
        }
    }

}

?>