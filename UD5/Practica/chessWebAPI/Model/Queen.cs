namespace ChessAPI.Model
{
    public class Queen : Piece
    {
        public Queen(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return PieceValues.QueenValue;
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            throw new NotImplementedException();
        }
    }
}
