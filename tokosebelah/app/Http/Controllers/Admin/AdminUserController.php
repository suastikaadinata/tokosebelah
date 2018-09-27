<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Category;
use App\Belanja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function user()
    {
        $users = User::all();
        
        return view('admin.list-user', [
            'users'     => $users         
        ]);
    }

    public function delete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->back();
    }
}
