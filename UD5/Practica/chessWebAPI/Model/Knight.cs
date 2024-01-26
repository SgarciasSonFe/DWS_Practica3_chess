namespace ChessAPI.Model
{
    public class Knight : Piece
    {
        public Knight(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return PieceValues.KnightPieceValue;
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            throw new NotImplementedException();
        }
    }
}
