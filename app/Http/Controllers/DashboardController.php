<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $balance = $user->page->balance->balance ?? 0;
        $jajan = $user->page->transactions->where('payment_status', 'paid')->count();
        $monthly = $user->page->transactions->where('payment_status', 'paid')->where('created_at', '>=', now()->subMonth())->sum('total');

        $endDate = Carbon::now();
        $startDate = Carbon::now()->subDays(30);

        $transactions = QueryBuilder::for(Transaction::where('page_id', $user->page->id))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, sum(total) as total')
            ->groupByRaw('DATE(created_at)')
            ->get();

        $result = [];
        $period = CarbonPeriod::create($startDate->addDay(), $endDate->addDay());
        foreach ($period as $dateOfPeriod) {
            $date = $dateOfPeriod->format('Y-m-d');
            $fundIndex = $transactions->search(function ($item) use ($date) {
                return $item->date == $date;
            });

            if ($fundIndex || $fundIndex === 0) {
                $result[] = [
                    'x' => Carbon::parse($transactions[$fundIndex]->date)->format('d M'),
                    'y' => (int) $transactions[$fundIndex]->total,
                ];
            } else {
                $result[] = [
                    'x' => Carbon::parse($date)->format('d M'),
                    'y' => 0,
                ];
            }
        }

        $chart = json_encode($result);

        return view('dashboard.dashboard', compact('balance', 'jajan', 'monthly', 'chart'));
    }
}
