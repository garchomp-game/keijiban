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

	public function index(Request $request)
	{
        if ($request->all()) {
            $boards = Board::
            where('title', 'like', "%{$request['search_text']}%")
            ->where('description', 'like', "%{$request['search_text']}%")
            ->paginate();
        } else {
            $boards = Board::paginate();
        }

		return view('boards.index', compact('boards'));
	}

    public function show(Board $board)
    {
        return redirect()->route('chat.show', $board->id);
    }

	public function create(Board $board)
	{
		return view('boards.create_and_edit', compact('board'));
	}

	public function store(BoardRequest $request)
	{
		Board::create($request->all());
		return redirect()->route('boards.index');
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

		return redirect()->route('boards.index', $board->id);
	}

	public function destroy(Board $board)
	{
            \DB::transaction(function () use($board) {
                foreach ($board->chats as $value) {
                    $value->delete();
                }
                $board->delete();
            });
		return redirect()->route('boards.index');
	}
}
