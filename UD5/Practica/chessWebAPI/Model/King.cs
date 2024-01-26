namespace ChessAPI.Model
{
    public class King : Piece
    {
        public King(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return 0;
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            throw new NotImplementedException();
        }
    }
}
