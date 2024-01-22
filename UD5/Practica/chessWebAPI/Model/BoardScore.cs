public class BoardScore
{
    private int _scoreBlack;
    private int _scoreWhite;
    private string _message;

    public BoardScore(int scoreBlack, int scoreWhite)
        {
            _scoreBlack = scoreBlack;
            _scoreWhite = scoreWhite;
            if(scoreBlack > scoreWhite)
            {
                _message = "Mensaje: van ganando las piezas NEGRAS por una distancia de "+(scoreBlack - scoreWhite)+" puntos.";
            } else if(scoreBlack < scoreWhite)
            {
                _message = "Mensaje: van ganando las piezas BLANCAS por una distancia de "+(scoreWhite - scoreBlack)+" puntos.";
            } else {
                _message = "Mensaje: hay un empate.";
            }
        }

    public string GetMessage()
    {
        return _message;
    }
}