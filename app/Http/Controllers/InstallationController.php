<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Installation;

class InstallationController extends Controller
{
    public function index(Request $request)
    {
        $installations = Installation::paginate(15);
        $users = User::all();

        return view('installations.list', compact('installations', 'users'));
    }
}
