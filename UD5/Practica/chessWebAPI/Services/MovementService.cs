using ChessAPI.Model;

public class MovementService : IMovementService
{
    public MovementResult  GetMovement(string board, Movement movement)
    {
        
        if(movement.IsValid())
        {
            MovementResult m = new MovementResult(board,true,"OK");
            
        }

        return m;
    }
}