namespace ChessAPI.Model
{
    public class MovementResult
    {
        public string board { get;set;}
        public bool status { get;set;}
        public string operationResult { get;set;}

        public MovementResult()
        {
        }
        public MovementResult(string board, bool status, string operationResult)
        {
            this.board = board;
            this.status = status;
            this.operationResult = operationResult;
        }
    }
}