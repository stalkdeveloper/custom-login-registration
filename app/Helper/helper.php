<?php
use Carbon\Carbon;
use App\Models\User;
use Session as Session;

/* Today Date */
if (!function_exists('todayDataGet')) {
    function todayDataGet()
    {
        try {
            $todayDate = Carbon::today();
            $date = date('D, d M Y', strtotime($todayDate));
            return $date;            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

/* User Info */
if (!function_exists('userInfo')) {
    function userInfo()
    {
        try {
            $user_email = Session::get('email');
            $user = User::where('email', $user_email)->first();
            return $user;            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

/* Last 10 User */
if (!function_exists('recentUser')) {
    function recentUser()
    {
        try {
            $user = User::orderBy('id', 'desc')->get()->take(5);
            return $user;            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}


