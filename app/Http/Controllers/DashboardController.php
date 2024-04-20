<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use App\Models\ReturnRent;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'cars' => Car::count(),
            'users' => User::where('role', 'user')->count(),
            'rents' => Rent::count(),
            'returns' => ReturnRent::count(),
            'income' => ReturnRent::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->select(DB::raw('SUM(total_tarif) as income'))->first()->income
        ];
        return view('index', compact('stats'));
    }

    public function getStats()
    {

        $stats = Rent::select(DB::raw('YEAR(created_at) as year,MONTH(created_at) as month, COUNT(*) as count'))
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();
        return response()->json($stats);
    }
}
