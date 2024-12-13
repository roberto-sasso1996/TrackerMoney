<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function store(Request $request)
    {
       $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'amount' => $request->amount,
            'description' => $request->description,
            'transaction_date' => $request->transaction_date
       ]);
       
       return redirect(route('home'));
    }
}
