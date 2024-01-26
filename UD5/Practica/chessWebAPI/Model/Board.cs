namespace ChessAPI.Model
{
    public class Board
    {
        private Piece[,] _boardPieces;

        public Board(string boardStatus)
        {
            string[] boardState = boardStatus.Split(',');
            _boardPieces = new Piece[8, 8];
            int c = 0;
            for (int i = 0; i < 8; i++)
            {
                for (int j = 0; j < 8; j++)
                {
                    if (boardState[c] == "RoB")
                    {
                        _boardPieces[i, j] = new Rook(Piece.ColorEnum.BLACK);
                    }
                    else if (boardState[c] == "KnB")
                    {
                        _boardPieces[i, j] = new Knight(Piece.ColorEnum.BLACK);
                    }
                    else if (boardState[c] == "BiB")
                    {
                        _boardPieces[i, j] = new Bishop(Piece.ColorEnum.BLACK);
                    }
                    else if (boardState[c] == "QuB")
                    {
                        _boardPieces[i, j] = new Queen(Piece.ColorEnum.BLACK);
                    }
                    else if (boardState[c] == "KiB")
                    {
                        _boardPieces[i, j] = new King(Piece.ColorEnum.BLACK);
                    }
                    else if (boardState[c] == "PaB")
                    {
                        _boardPieces[i, j] = new Pawn(Piece.ColorEnum.BLACK);
                    }
                    else if (boardState[c] == "RoW")
                    {
                        _boardPieces[i, j] = new Rook(Piece.ColorEnum.WHITE);
                    }
                    else if (boardState[c] == "KnW")
                    {
                        _boardPieces[i, j] = new Knight(Piece.ColorEnum.WHITE);
                    }
                    else if (boardState[c] == "BiW")
                    {
                        _boardPieces[i, j] = new Bishop(Piece.ColorEnum.WHITE);
                    }
                    else if (boardState[c] == "QuW")
                    {
                        _boardPieces[i, j] = new Queen(Piece.ColorEnum.WHITE);
                    }
                    else if (boardState[c] == "KiW")
                    {
                        _boardPieces[i, j] = new King(Piece.ColorEnum.WHITE);
                    }
                    else if (boardState[c] == "PaW")
                    {
                        _boardPieces[i, j] = new Pawn(Piece.ColorEnum.WHITE);
                    }
                    c++;
                }
            }
        } 

        //Método que devuelve el objeto requerido en la práctica 
        public BoardScore GetScore()
        {
            int scoreBlack = 0;
            int scoreWhite = 0;
            for (int i = 0; i < 8; i++)
            {
                for (int j = 0; j < 8; j++)
                {
                    if (_boardPieces[i, j] != null)
                    {
                        if (GetPiece(i, j)._color == Piece.ColorEnum.BLACK)
                        {
                            scoreBlack += GetPiece(i, j).GetScore();
                        }
                        else if (GetPiece(i, j)._color == Piece.ColorEnum.WHITE)
                        {
                            scoreWhite += GetPiece(i, j).GetScore();
                        }
                    }
                }
            }
            BoardScore boardScore = new BoardScore(scoreBlack, scoreWhite);
            return boardScore;
        }
        public Piece GetPiece(int row, int column)
        {
            return _boardPieces[row, column];
        }
    }
}