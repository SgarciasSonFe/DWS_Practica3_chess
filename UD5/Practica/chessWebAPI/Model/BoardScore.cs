public class BoardScore
{
    public int _scoreBlack { get;set;}
    public int _scoreWhite { get;set;}
    public string _message { get;set;}

    public BoardScore()
    {
        this._scoreBlack = 0;
        this._scoreWhite = 0;
        this._message = string.Empty;
    }

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