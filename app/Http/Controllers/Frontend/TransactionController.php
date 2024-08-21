<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function transactions()
    {
        $transactions = Transaction::search(request('query'), function ($query) {
            $query->where('user_id', auth()->user()->id)
                ->when(request('date'), function ($query) {
                    $query->whereDay('created_at', '=', Carbon::parse(request('date'))->format('d'));
                });
        })->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('frontend::user.transaction.index', compact('transactions'));
    }
}
