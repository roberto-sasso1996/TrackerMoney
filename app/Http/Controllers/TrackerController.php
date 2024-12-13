<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackerController extends Controller
{
    public function home(){
        $user = Auth::user();
        $balance = $user->calculateBalance();

        $monthlyData = $user->transactions()
        ->selectRaw('MONTH(transaction_date) as month, type, SUM(amount) as total')
        ->groupBy('month', 'type')
        ->get();

        $incomeData = [];
        $expenseData = [];

        foreach (range(1, 12) as $month) {
            $incomeData[] = $monthlyData->where('month', $month)->where('type', 'income')->sum('total');
            $expenseData[] = $monthlyData->where('month', $month)->where('type', 'expense')->sum('total');
        }

        return view('home' , compact('balance','incomeData', 'expenseData'));
    }

    public function index(){
        $user = Auth::user();
        $balance = $user->calculateBalance();


        // Recupera tutte le transazioni dell'utente
        $transactions = $user->transactions()
            ->selectRaw('YEAR(transaction_date) as year, MONTH(transaction_date) as month, type, SUM(amount) as total')
            ->groupBy('year', 'month', 'type')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Prepara i dati per le entrate e le uscite
        $incomeData = [];
        $expenseData = [];

        // Organizza i dati per mese
        foreach ($transactions as $transaction) {
            $dateKey = $transaction->year . '-' . str_pad($transaction->month, 2, '0', STR_PAD_LEFT);
            
            if ($transaction->type === 'income') {
                $incomeData[$dateKey][] = $transaction;
            } else {
                $expenseData[$dateKey][] = $transaction;
            }
        }

        return view('index', compact('balance','incomeData', 'expenseData'));
    }
}
