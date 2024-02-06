using ChessAPI.Model;
using Microsoft.AspNetCore.Mvc;

namespace ChessAPI.Controllers;

[ApiController]
[Route("[controller]")]
public class MovementController : ControllerBase
{
    private IMovementService _movementService;

    public MovementController(IMovementService movementService)
    {
        this._movementService = movementService;
    }

    [HttpGet]
    public IActionResult Get(string board, int fromColumn, int fromRow, int toColumn, int toRow)
    {
        try
        {
            if (string.IsNullOrEmpty(board))
                return BadRequest("board no puede ser IsNullOrEmpty");

            Movement movement = new Movement(fromColumn, fromRow, toColumn, toRow);
            var response = _movementService.GetMovement(board, movement);
            return Ok(response);
        }
        catch (Exception ex)
        {
            return StatusCode(StatusCodes.Status500InternalServerError);
        }
    }
}
