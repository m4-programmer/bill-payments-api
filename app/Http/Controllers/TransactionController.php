<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return TransactionResource::collection(Transaction::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'description' => 'nullable',
            'amount' => 'required',
        ]);
        $transaction = Transaction::create($data);
        return new TransactionResource($transaction);
    }

    public function show($id)
    {
        return new TransactionResource(Transaction::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'description' => 'nullable',
            'amount' => 'required',
        ]);
        $transaction = Transaction::findOrFail($id);
        $transaction->update($data);
        return new TransactionResource($transaction);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return response()->noContent();
    }
}
