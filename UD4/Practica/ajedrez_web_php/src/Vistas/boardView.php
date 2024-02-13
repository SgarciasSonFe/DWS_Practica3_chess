<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../css/boardView.css">
</head>

<body>
    <?php
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['name']))
        {
            header("Location: login.php");
        }
    ?>
    <header>
        <a href="index.php" class="chess_game"><h1>Menú principal</h1></a>
        <nav>
            <ul>
                <a href="new_gameView.php">
                    <li class="link"> Nueva partida </li>
                </a>
                <?php
                if($_SESSION['profile'] == "premium")
                {
                    echo "<a href='gameListView.php'>
                            <li class='link'> Lista de partidas </li>
                        </a>";
                }
                ?>
                
                <br>
                <a id="logout" href="logout.php"> Cerrar sesión </a>
            </ul>
        </nav>
    </header>

    <?php 
        // Se comprueva si va a pintar una partida nueva o ya existente.
        if($_GET['matchId'] != false){
            $matchId = $_GET['matchId'];
            $title = $_GET['title'];
            $whiteName = $_GET['whiteName'];
            $blackName = $_GET['blackName'];
            $matchStatus = $_GET['btn'];
            echo "<title>".$title." repetición</title>";

            drawMatchInfo($title,$whiteName,$blackName);

            require "../Negocio/boardStatusBL.php";
            $boardStatus = new BoardStatusBL();
            $boardStatusList = $boardStatus->obtainBoardStatus($matchId);

            $match = array();
            foreach($boardStatusList as $state)
            {
                array_push($match,$state->getBoard());
            }
            
            // Con este if se comprueba la fase de la partida en la que el usuario
            // se encuentra y hacia la fase a la que va.
            if($matchStatus != 0){
                $matchStatus = $_GET['matchStatus'];
                $btn = $_GET['btn'];
                switch ($btn) {
                    case 1:
                        $matchStatus = 0;
                        scoreMarker($match[$matchStatus]);
                        drawChessGame($match[$matchStatus]);
                        break;
                    case 2:
                        if(($matchStatus - 1) < 0)
                        {
                            scoreMarker($match[$matchStatus]);
                            drawChessGame($match[$matchStatus]);
                        } else {
                            $matchStatus--;
                            scoreMarker($match[$matchStatus]);
                            drawChessGame($match[$matchStatus]);
                        }
                        break;
                    case 3:
                        if(($matchStatus + 1) > (count($match) -1))
                        {
                            scoreMarker($match[$matchStatus]);
                            drawChessGame($match[$matchStatus]);
                        } else {
                            $matchStatus++;
                            scoreMarker($match[$matchStatus]);
                            drawChessGame($match[$matchStatus]);
                        }
                        break;
                    case 4:
                        $matchStatus = count($match) -1;
                        scoreMarker($match[$matchStatus]);
                        drawChessGame($match[$matchStatus]);
                        break;
                    default:
                        scoreMarker($match[0]);
                        drawChessGame($match[0]);
                        break;
                }
            } else if($match[0] != false){
                $matchStatus = 0;
                scoreMarker($match[0]);
                drawChessGame($match[0]);
            } else {
                $matchStatus = 0;
                echo "<p id='error'>No hay datos registrados de la partida.</p>";
            }
            echo "<div id='button_pannel'>
                  <a href='boardView.php?matchId=$matchId&title=$title&whiteName=$whiteName&blackName=$blackName&matchStatus=$matchStatus&btn=1'><div class='button'><img class='btn_img' src='../../img/icons/inicio.png'></div></a>";
            echo "<a href='boardView.php?matchId=$matchId&title=$title&whiteName=$whiteName&blackName=$blackName&matchStatus=$matchStatus&btn=2'><div class='button'><img class='btn_img' src='../../img/icons/retroceder.png'></div></a>";
            echo "<a href='boardView.php?matchId=$matchId&title=$title&whiteName=$whiteName&blackName=$blackName&matchStatus=$matchStatus&btn=3'><div class='button'><img class='btn_img' src='../../img/icons/avanzar.png'></div></a>";
            echo "<a href='boardView.php?matchId=$matchId&title=$title&whiteName=$whiteName&blackName=$blackName&matchStatus=$matchStatus&btn=4'><div class='button'><img class='btn_img' src='../../img/icons/fin.png'></div></a>
                </div>";


        } else if($_POST['fromColumn'] != null)
        {
            require("../Negocio/matchesBL.php");
            $matchesBL = new MatchesBL();
            $matchesData = $matchesBL->obtainMatchData();
            $matchData = end($matchesData); // Recojo solo los datos de la ultima partida porque es la última que ha sido creada y la que está en uso actualmente.

            require("../Negocio/playersBL.php");
            $playersBL = new PlayersBL();
            $playersData = $playersBL->obtainPlayerData();

            require "../Negocio/boardStatusBL.php";
            $boardStatus = new BoardStatusBL();
            $boardStatusList = $boardStatus->obtainBoardStatus($matchData->getID());
            $lastBoard = end($boardStatusList); 

            // Se recoge el board con el movimiento ya realizado.
            $board = movement($lastBoard->getBoard(), $_POST['fromColumn'], $_POST['fromRow'], $_POST['toColumn'], $_POST['toRow']);
            
            drawMatchInfo($matchData->getTitle(),getPlayerName($matchData->getWhite(),$playersData),getPlayerName($matchData->getBlack(),$playersData));
            scoreMarker($board);

            echo "<form action='boardView.php' method='POST'>
                    <h2>Movimiento de piezas</h2>
                    Origen: 
                    <label for='fromRow'>Fila: </label>
                    <input class='num' id='fromRow' name='fromRow' type='number'>
                    <label for='fromColumn'>Columna: </label>
                    <input class='num' id='fromColumn' name='fromColumn' type='number'><br>
                    Destino: 
                    <label for='toRow'>Fila: </label>
                    <input class='num' id='toRow' name='toRow' type='number'>
                    <label for='toColumn'>Columna: </label>
                    <input class='num' id='toColumn' name='toColumn' type='number'><br>
                    <input type='submit' value='Mover' class='move'>
                </form>";
            
            drawChessGame($board);

            // Se inserta el tablero en la base de datos.
            $boardStatus->insertBoardStatus($board, $matchData->getID());
            
        } else {
            // Se pone el estado inicial del tablero.
            $board = "RoB,KnB,BiB,QuB,KiB,BiB,KnB,RoB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,PaB,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,X,PaW,PaW,PaW,PaW,PaW,PaW,PaW,PaW,RoW,KnW,BiW,QuW,KiW,BiW,KnW,RoW";

            // Datos conseguidos de new_gameView.php.
            $title = $_POST['name_title'];
            $white = $_POST['id_player1'];
            $black = $_POST['id_player2'];
        
            // Se insertan los datos de la partida en la base de datos.
            require "../Negocio/matchesBL.php";
            $matchesBL = new MatchesBL();
            $matchesBL->insertMatchData($title,$white,$black);
        
            // Se pintan los datos generales de la partida.
            echo "<title>".$title."</title>";

            require("../Negocio/playersBL.php");
            $playersBL = new PlayersBL();
            $playersData = $playersBL->obtainPlayerData();
            drawMatchInfo($title,getPlayerName($white,$playersData),getPlayerName($black,$playersData));
            scoreMarker($board);

            echo "<form action='boardView.php' method='POST'>
                    <h2>Movimiento de piezas</h2>
                    Origen: 
                    <label for='fromRow'>Fila: </label>
                    <input class='num' id='fromRow' name='fromRow' type='number'>
                    <label for='fromColumn'>Columna: </label>
                    <input class='num' id='fromColumn' name='fromColumn' type='number'><br>
                    Destino: 
                    <label for='toRow'>Fila: </label>
                    <input class='num' id='toRow' name='toRow' type='number'>
                    <label for='toColumn'>Columna: </label>
                    <input class='num' id='toColumn' name='toColumn' type='number'><br>
                    <input type='submit' value='Mover' class='move'>
                </form>";
            
            drawChessGame($board);
            
            // Se inserta el tablero en la base de datos.
            $matches = $matchesBL->obtainMatchData();
            $matchData = end($matches);
            require "../Negocio/boardStatusBL.php";
            $boardStatusBL = new BoardStatusBL();
            $boardStatusBL->insertBoardStatus($board, $matchData->getID());
        }
    ?>

    <?php
        function movement($boar, $fromColumn, $fromRow, $toColumn, $toRow)
        {
            require "../Negocio/apiMovementBL.php";
            $x = new ApiMovementBL();
            $movement = $x->movementTest($boar, intval($fromColumn), intval($fromRow), intval($toColumn), intval($toRow));
            
            $i=0;
            foreach ($movement as $value) {
                switch ($i) {
                    case 0:
                        $movedBoard = $value;
                        break;
                    case 1:
                        $moveValid = $value;
                        break;
                }
                $i++;
            }
            if($moveValid)
            {
                return $movedBoard;
            } else {
                echo "<p id='error'>Movimiento erroneo</p>";
                return $boar;
            }
        }
        function scoreMarker($board)
        {
            require "../Negocio/apiScoreBL.php";
            $x = new ApiScoreBL();
            $scoreMarker = $x->boardTest($board);
            foreach ($scoreMarker as $value) {
                if(is_string($value))
                {
                    echo "<p id='marker'>".$value."</p>";
                }
            }
        }

        function getPlayerName($id,$playersData)
        {
            foreach($playersData as $player)
            {
                if($player->getID() == $id)
                {
                    return $player->getName();
                }
            }
            return "Player not found";
        }

        function drawMatchInfo($title,$white,$black)
        {
            echo "<div id='info'><h1>".$title."</h1><p>".$white." VS ".$black."</p></div>";
        }

        function drawChessGame($boardLine)
        {
            $nothing = "";
            $blaRook = "<img class='piece' src='../../img/BLArook.png'>";
            $blaKnight = "<img class='piece' src='../../img/BLAknight.png'>";
            $blaBishop = "<img class='piece' src='../../img/BLAbishop.png'>";
            $blaQueen = "<img class='piece' src='../../img/BLAqueen.png'>";
            $blaKing = "<img class='piece' src='../../img/BLAking.png'>";
            $blaPawn = "<img class='piece' src='../../img/BLApawn.png'>";
            $whiRook = "<img class='piece' src='../../img/WHIrook.png'>";
            $whiKnight = "<img class='piece' src='../../img/WHIknight.png'>";
            $whiBishop = "<img class='piece' src='../../img/WHIbishop.png'>";
            $whiQueen = "<img class='piece' src='../../img/WHIqueen.png'>";
            $whiKing = "<img class='piece' src='../../img/WHIking.png'>";
            $whiPawn = "<img class='piece' src='../../img/WHIpawn.png'>";

            $board = explode(",",$boardLine);
            
            capturedWhites($board);

            echo "<table>";
            $j = 0;
            for($i=0;$i<9;$i++)
            {
                echo "<tr>"; 
                while($j<($i*8)) 
                {
                    if($board[$j] == "RoB") {
                        boxColor($i,$j,$blaRook);
                    } else if($board[$j] == "KnB"){
                        boxColor($i,$j,$blaKnight);
                    } else if($board[$j] == "BiB"){
                        boxColor($i,$j,$blaBishop);
                    } else if($board[$j] == "QuB"){
                        boxColor($i,$j,$blaQueen);
                    } else if($board[$j] == "KiB"){
                        boxColor($i,$j,$blaKing);
                    } else if($board[$j] == "PaB"){
                        boxColor($i,$j,$blaPawn); 
                    
                    } else if($board[$j] == "RoW") {
                        boxColor($i,$j,$whiRook); 
                    } else if($board[$j] == "KnW"){
                        boxColor($i,$j,$whiKnight); 
                    } else if($board[$j] == "BiW"){
                        boxColor($i,$j,$whiBishop); 
                    } else if($board[$j] == "QuW"){
                        boxColor($i,$j,$whiQueen); 
                    } else if($board[$j] == "KiW"){
                        boxColor($i,$j,$whiKing); 
                    } else if($board[$j] == "PaW"){
                        boxColor($i,$j,$whiPawn); 
                    } else {
                        boxColor($i,$j,$nothing);
                    }
                    $j++;
                }
                echo "</tr>";
            }
            echo "</table>";

            capturedBlacks($board);
        }

        function boxColor($i,$j,$piece)
        {
            if($i % 2) 
            {
                if($j % 2) 
                {
                    echo "<td><div class='blanco'>".$piece."</div></td>";
                } else {
                    echo "<td><div class='negro'>".$piece."</div></td>";
                }
            } else if(($i % 2)-1) 
            {
                if($j % 2) 
                {
                    echo "<td><div class='negro'>".$piece."</div></td>";
                } else {
                    echo "<td><div class='blanco'>".$piece."</div></td>";
                }
            }
        }

        function capturedWhites($board)
        {
            $row= 0;
            $knw = 0;
            $biw = 0;
            $quw = 0;
            $paw = 0;

            $j = 0;
            for($i=0;$i<9;$i++)
            {
                while($j<($i*8)) 
                {
                    if($board[$j] == "RoW") {
                        $row++;
                    } else if($board[$j] == "KnW"){
                        $knw++;
                    } else if($board[$j] == "BiW"){
                        $biw++;
                    } else if($board[$j] == "QuW"){
                        $quw++;
                    } else if($board[$j] == "PaW"){
                        $paw++;
                    }
                    $j++;
                }
            }
            echo "<div class='capturedsZone'>";
            for($i=2;$i>$row;$i--)
            {
                echo "<img class='captured' src='../../img/WHIrook.png'>";
            }
            for($i=2;$i>$knw;$i--)
            {
                echo "<img class='captured' src='../../img/WHIknight.png'>";
            }
            for($i=2;$i>$biw;$i--)
            {
                echo "<img class='captured' src='../../img/WHIbishop.png'>";
            }
            if($quw != 1)
            {
                echo "<img class='captured' src='../../img/WHIqueen.png'>";
            }
            for($i=8;$i>$paw;$i--)
            {
                echo "<img class='captured' src='../../img/WHIpawn.png'>";
            }
            echo "</div>";
        }

        function capturedBlacks($board)
        {
            $rob= 0;
            $knb = 0;
            $bib = 0;
            $qub = 0;
            $pab = 0;
            
            $j = 0;
            for($i=0;$i<9;$i++)
            {
                while($j<($i*8)) 
                {
                    if($board[$j] == "RoB") {
                        $rob++;
                    } else if($board[$j] == "KnB"){
                        $knb++;
                    } else if($board[$j] == "BiB"){
                        $bib++;
                    } else if($board[$j] == "QuB"){
                        $qub++;
                    } else if($board[$j] == "PaB"){
                        $pab++;
                    }
                    $j++;
                }
            }
            echo "<div class='capturedsZone'>";
            for($i=2;$i>$rob;$i--)
            {
                echo "<img class='captured' src='../../img/BLArook.png'>";
            }
            for($i=2;$i>$knb;$i--)
            {
                echo "<img class='captured' src='../../img/BLAknight.png'>";
            }
            for($i=2;$i>$bib;$i--)
            {
                echo "<img class='captured' src='../../img/BLAbishop.png'>";
            }
            if($qub != 1)
            {
                echo "<img class='captured' src='../../img/BLAqueen.png'>";
            }
            for($i=8;$i>$pab;$i--)
            {
                echo "<img class='captured' src='../../img/BLApawn.png'>";
            }
            echo "</div>";
        }
    ?>
</body>
</html>