<?php

namespace App\Services\User;

use App\Services\Service;
use Illuminate\Support\Facades\DB;

class CommonService extends Service
{
    public function saveData($table, $data)
    {
        try {
            $data = DB::table($table)->insert($data);
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getsingleData($id, $table)
    {
        try {
            $data = DB::table($table)->where('email', $id)->first();
            return $data;
        } catch (\Throwable $th) {
            \Log::info($th);
        }
    }
}
