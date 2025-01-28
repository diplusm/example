<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'period' => 'integer|max:365'
        ]);

        $period = (int) $request->input('period', '30');
        
        $analytics = [
            'visitors' => Analytics::get_visitors($period),
            'online' => Analytics::get_visitors_online(),
            'applications' => Analytics::get_applications($period)
        ];

        //dd($analytics);
        if($request->expectsJson()){
            return response()->json($analytics);
        }

        return view('analytics', $analytics); 
        //return response()->json($analytics);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(analytics $analytics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(analytics $analytics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, analytics $analytics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(analytics $analytics)
    {
        //
    }
}
