<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function show() {
        $timeStart = microtime(true);

        $data = Staff::paginate(20);
        for ($i = 0; $i < 100; $i++) {
            if (Cache::has('staff')) {
                $data = Cache::get('staff');
            } else {
                $data = Staff::all();
                Cache::put('staff', $data, 60);
            }
        }

        $timeEnd = microtime(true);
        dd($timeEnd - $timeStart);

        return response()->json([
            "success" => true,
            "data" => $data
        ]);
    }
}
