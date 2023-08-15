<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\User\CommonService;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        try {
            $userData = User::orderBy('id', 'desc')->paginate(10);
            $user = User::orderBy('id', 'desc')->get();
            $userCount = count($user) ?? 0;

            return view('User.Dashboard.dashboard', compact('userData', 'userCount'));
        } catch (\Throwable $e) {
        }
    }
}
