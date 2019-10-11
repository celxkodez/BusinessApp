<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UsersController extends Controller
{

  public function index()
  {
    return UserResource::collection(User::paginate(10));
  }

  public function show(Request $request)
  {
    //dd($request->user);
    return UserResource::collection(User::wehere('id', $request->user)->get());
  }

  public function profile()
  {
    $profile = User::where('id', 1)->with('country:id,name')->get();

    return response()->json([
      'statusCode' => 200,
      'message' => 'User profile',
      'result' => $profile,
    ], 200);
  }

  protected function validator(Request $data)
  {
    return Validator::make($data, [
      'username' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\User
   */
  protected function create(Request $data)
  {
    return User::create([
      'username' => $data['username'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);
    return new UserResource($user);
  }
  public function update(User $user, Request $request)
  {
    $data = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
    ]);

    $user->update($data);

    return new UserResource($user);
  }
}
