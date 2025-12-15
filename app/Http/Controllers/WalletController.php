<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalletTransaction;

class WalletController extends Controller
{
    //finding the current balance
    public function deposit($amount) 
    {   
        $amount = floatval($amount);

        $lastTransaction = WalletTransaction::latest()->first();

        $currentBalance = $lastTransaction ? $lastTransaction->running_balance : 0;

        $newBalance = $currentBalance + $amount;

        $transaction = WalletTransaction::create([
            'amount' => $amount,
            'running_balance' => $newBalance,
            'description' => 'deposited with API'
        ]);

        return response()->json([
            'status' => 200,
            'previous_balance' => $currentBalance,
            'deposit_amount' => $amount,
            'new_balance' => $transaction->running_balance,
        ]);
    }

}
