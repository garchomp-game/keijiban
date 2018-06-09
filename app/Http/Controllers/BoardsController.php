<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoardRequest;

class BoardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$boards = Board::paginate();
		return view('boards.index', compact('boards'));
	}

    public function show(Board $board)
    {
        return view('boards.show', compact('board'));
    }

	public function create(Board $board)
	{
		return view('boards.create_and_edit', compact('board'));
	}

	public function store(BoardRequest $request)
	{
		Board::create($request->all());
    		return redirect()->route('boards.index')->with('message', 'Created successfully.');
	}

	public function edit(Board $board)
	{
        $this->authorize('update', $board);
		return view('boards.create_and_edit', compact('board'));
	}

	public function update(BoardRequest $request, Board $board)
	{
		$this->authorize('update', $board);
		$board->update($request->all());

		return redirect()->route('boards.show', $board->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Board $board)
	{
		$this->authorize('destroy', $board);
		$board->delete();

		return redirect()->route('boards.index')->with('message', 'Deleted successfully.');
	}
}
