<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

	public function create(User $user)
	{
		return view('users.create_and_edit', compact('user'));
	}

	public function store(UserRequest $request)
	{
		$user = User::create($request->all());
		return redirect()->route('users.show', $user->id)->with('message', 'Created successfully.');
	}

	public function edit(User $user)
	{
        $this->authorize('update', $user);
		return view('users.create_and_edit', compact('user'));
	}

	public function update(UserRequest $request, User $user)
	{
		$this->authorize('update', $user);
		$user->update($request->all());

		return redirect()->route('users.show', $user->id)->with('message', 'Updated successfully.');
	}

	public function destroy(User $user)
	{
		$this->authorize('destroy', $user);
		$user->delete();

		return redirect()->route('users.index')->with('message', 'Deleted successfully.');
	}
}
