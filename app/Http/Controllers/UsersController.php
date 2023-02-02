<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index()
    {
        return view('admin.users')->with([
            'users' => User::paginate(5)
        ]);
    }
    function destroy($id)
    {
        User::destroy($id);
        return redirect()->action([UsersController::class, 'index'])->with('success', 'Record has been deleted successfully!');
    }
    function make_admin($id)
    {
        $user = User::findOrFail($id);
        $user['is_admin'] = !$user['is_admin'];
        $user->save();
        return redirect()->action([UsersController::class, 'index']);
        


    }
}
