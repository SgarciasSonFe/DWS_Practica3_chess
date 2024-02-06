using ChessAPI.Model;

public class MovementService : IMovementService
{
    public MovementResult  GetMovement(string board, Movement movement)
    {
        try
        {
            if(movement.IsValid())
            {
                Board b = new Board(board);
                
                return b.GetMovementResult(movement);
            } else {
                return new MovementResult(board,false,"OK");
            }
        }
        catch (System.Exception)
        {
            return new MovementResult(board,false,"ERROR");
        }
        
    }
}