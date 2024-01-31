namespace ChessAPI.Model
{
    public class MovementResult
    {
        public string board;
        public bool status;
        public string operationResult;

        public MovementResult(string board, bool status, string operationResult)
        {
            this.board = board;
            this.status = status;
            this.operationResult = operationResult;
        }
    }
}