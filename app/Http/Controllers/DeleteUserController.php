<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{

  /*
  Delete a user by admin
  */
    public function DeleteUser(Request $request){
      $user=User::FindOrFail($request->id);
      $user->delete();
    }
}