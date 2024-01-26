namespace ChessAPI.Model
{
    public class Bishop : Piece
    {
        public Bishop(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return PieceValues.BishopPieceValue;
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            throw new NotImplementedException();
        }
    }
}
