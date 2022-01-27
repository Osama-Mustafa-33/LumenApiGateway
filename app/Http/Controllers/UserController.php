<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    use ApiResponser;

    public function __construct()
    {
    }

    public function index()
    {
        $users = User::all();
        return $this->validResponse($users);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:255|confirmed'
        ];

        $this->validate($request, $rules);
        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);
        $user = User::create($fields);
        return $this->validResponse($user, Response::HTTP_CREATED);
    }

    public function show($user)
    {
        $user = User::findOrFail($user);
        return $this->validResponse($user);
    }

    public function update(Request $request, $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user,
            'password' => 'max:255|confirmed'
        ];

        $this->validate($request, $rules);
        $user = User::findOrFail($user);
        $user->fill($request->all());

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($user->isClean()) {
            return $this->errorResponse('Youm must update at least one field',
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();
        return $this->validResponse($user);
    }

    public function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->delete();
        return $this->validResponse($user);
    }

    public function me(Request $request)
    {
        return $this->validResponse($request->user());
    }

}
