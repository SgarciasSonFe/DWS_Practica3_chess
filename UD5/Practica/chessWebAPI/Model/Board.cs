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

        public string ConvertBoardLine()
        {
            string board = "";
            for (int i = 0; i < 8; i++)
            {
                for (int j = 0; j < 8; j++)
                {
                    if(_boardPieces[i, j] != null)
                    {
                        board += _boardPieces[i, j].GetCode();
                    } else {
                        board += "X";
                    }
                    if(i != 7 || j != 7)
                    {
                        board += ",";
                    }
                }
            }
            return board;
        }

        //Método que devuelve el objeto BoardScore 
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

        // Método que devuelve el objeto MovementResult con el board modificado, si es que se puede mover la pieza.
        public MovementResult GetMovementResult(Movement movement)
        {
            if(_boardPieces[movement.fromRow,movement.fromColumn].Validate(movement, _boardPieces) != Piece.MovementType.InvalidNormalMovement)
            {
                _boardPieces[movement.toRow,movement.toColumn] = _boardPieces[movement.fromRow,movement.fromColumn];
                _boardPieces[movement.fromRow,movement.fromColumn] = null;

                return new MovementResult(ConvertBoardLine(),true,"OK");
            } else {
                return new MovementResult(ConvertBoardLine(),false,"OK");
            }
        }
    }
}