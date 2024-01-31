using ChessAPI.Model;

public interface IMovementService
{
    MovementResult GetMovement(string board, Movement movement); 
}