<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class AssignRoleController extends Controller
{
    /*
    give a user new role by admin
    */
    public function AssignRole(Request $request){
        $user=User::findOrFail($request->id);
        $user->assignRole(['Admin Assistant']);
}
}
