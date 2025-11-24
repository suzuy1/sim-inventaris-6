<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Consumable;
use App\Models\ConsumableDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // HALAMAN MENU TRANSAKSI
    public function index()
    {
        // Tampilkan riwayat transaksi terbaru
        $transactions = Transaction::with(['detail.consumable', 'user'])
                        ->latest()
                        ->paginate(20);

        return view('pages.transactions.index', compact('transactions'));
    }

    // FORM BARANG KELUAR
    public function create()
    {
        // Ambil barang yang stoknya > 0 saja
        $consumables = Consumable::with(['details' => function($q) {
            $q->where('current_stock', '>', 0);
        }])->get();

        return view('pages.transactions.create', compact('consumables'));
    }

    // PROSES SIMPAN BARANG KELUAR
    public function store(Request $request)
    {
        $request->validate([
            'consumable_detail_id' => 'required|exists:consumable_details,id',
            'amount' => 'required|integer|min:1',
            'date' => 'required|date',
            'notes' => 'required|string',
        ]);

        $batch = ConsumableDetail::findOrFail($request->consumable_detail_id);

        // 1. CEK STOK CUKUP GAK?
        if ($batch->current_stock < $request->amount) {
            return back()->withErrors(['amount' => "Stok tidak cukup! Sisa stok batch ini hanya: {$batch->current_stock}"]);
        }

        // GUNAKAN DB TRANSACTION (Agar data aman)
        DB::transaction(function () use ($request, $batch) {
            // A. Kurangi Stok di Tabel Master
            $batch->decrement('current_stock', $request->amount);

            // B. Catat di Riwayat Transaksi (Log)
            Transaction::create([
                'user_id' => Auth::id(),
                'consumable_detail_id' => $batch->id,
                'type' => 'keluar',
                'amount' => $request->amount,
                'date' => $request->date,
                'notes' => $request->notes,
            ]);
        });

        return redirect()->route('transaksi.index')->with('success', 'Barang keluar berhasil dicatat. Stok berkurang.');
    }
}