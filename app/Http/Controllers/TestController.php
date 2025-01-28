<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Migrations;

class TestController extends Controller
{
    public static function migrations(Request $request){ 
        $migrations = DB::table('migrations')->get();

        return response()->json($migrations);
        //return view('main', ['migrations' => $migrations]);
    }

    public static function migration(Request $request, $id){ 
        $request->merge(['id' => $request->route('id')]);
        $request->validate([
            'id' => [
                'required',
                'max:6'
            ]
        ]);

        $migrations = DB::table('migrations')->where('id', $id)->get();
        return response()->json($migrations);
        //return view('main', ['migrations' => $migrations]);
    }
}
