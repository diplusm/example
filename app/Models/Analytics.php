<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Analytics extends Model
{
    public static function get_visitors($period){
        $visitors = DB::connection('CRM')
            ->table('visitors')
            ->select('action', DB::raw('COUNT(*) as visitors, DATE(last_visit) as Date'))
            ->where('last_visit', '>=', now()->subDays($period))
            ->groupByRaw('Date, action')
            ->get()
            ->keyBy('Date');

        $dates = collect();
        $startdate = carbon::today()->subDays($period);
        $enddate = carbon::today();

        while($startdate->lte($enddate)){
            $dates->push($startdate->format('Y-m-d'));
            $startdate->addDay();
        }

        $analytics = $dates->map(function ($date) use ($visitors){
            return (object) [
                'action' => $visitors->get($date)->action ?? 0,
                'date' => $date,
                'visitors' => $visitors->get($date)->visitors ?? 0
            ];
        });

        return $analytics;
    }

    public static function get_visitors_online(){
        return DB::connection('CRM')
            ->table('visitors')
            ->select(DB::raw('COUNT(*) as online'))
            ->where('last_visit', '>=', DB::raw('NOW() - INTERVAL 1 MINUTE'))
            ->value('online');
    }

    public static function get_applications($period){
            $data = DB::connection('CRM')
            ->table('orders')
            ->select('status', DB::raw('COUNT(*) as total'))
            ->where('date', '>=', now()->subDays($period))
            ->groupBy('status')
            ->get();

            $applications = $data->mapWithKeys(function($item){
                return [$item->status => $item->total];
            });
            
            return (object) $applications->toArray();
    }
}
