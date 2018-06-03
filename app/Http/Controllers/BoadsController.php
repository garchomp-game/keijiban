<?php

namespace App\Http\Controllers;

use App\Models\Boad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoadRequest;

class BoadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$boads = Boad::paginate();
		return view('boads.index', compact('boads'));
	}

    public function show(Boad $boad)
    {
        return view('boads.show', compact('boad'));
    }

	public function create(Boad $boad)
	{
		return view('boads.create_and_edit', compact('boad'));
	}

	public function store(BoadRequest $request)
	{
		$boad = Boad::create($request->all());
		return redirect()->route('boads.show', $boad->id)->with('message', 'Created successfully.');
	}

	public function edit(Boad $boad)
	{
        $this->authorize('update', $boad);
		return view('boads.create_and_edit', compact('boad'));
	}

	public function update(BoadRequest $request, Boad $boad)
	{
		$this->authorize('update', $boad);
		$boad->update($request->all());

		return redirect()->route('boads.show', $boad->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Boad $boad)
	{
		$this->authorize('destroy', $boad);
		$boad->delete();

		return redirect()->route('boads.index')->with('message', 'Deleted successfully.');
	}
}