<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetDetail;
use App\Models\ConsumableDetail;
use App\Models\Loan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. STATISTIK UTAMA (KARTU ATAS)
        
        // Total Nilai Aset (Sum Harga Beli semua aset fisik)
        $totalAssetValue = AssetDetail::sum('price');
        
        // Jumlah Barang Sedang Dipinjam
        $activeLoans = Loan::where('status', 'dipinjam')->count();
        
        // Jumlah Batch BHP yang Stoknya Menipis (< 5)
        $lowStockCount = ConsumableDetail::where('current_stock', '<', 5)->where('current_stock', '>', 0)->count();
        
        // 2. DATA WARNING (TABEL)

        // Daftar Peminjam yang TELAT (Lewat Jatuh Tempo & Belum Kembali)
        $lateLoans = Loan::with(['asset.inventory'])
                    ->where('status', 'dipinjam')
                    ->where('return_date_plan', '<', now()) // Tanggal rencana < Hari ini
                    ->get();

        // Daftar Barang BHP yang Hampir Kadaluarsa (1 Bulan ke depan) atau Sudah Expired
        $expiringItems = ConsumableDetail::with('consumable')
                        ->whereNotNull('expiry_date')
                        ->where('expiry_date', '<', now()->addMonth()) // Kurang dari 30 hari lagi
                        ->where('current_stock', '>', 0) // Hanya yang masih ada stoknya
                        ->orderBy('expiry_date', 'asc')
                        ->limit(5)
                        ->get();

        // Daftar Stok Menipis (Limit 5 biar dashboard gak penuh)
        $lowStocks = ConsumableDetail::with('consumable')
                    ->where('current_stock', '<', 5)
                    ->where('current_stock', '>', 0)
                    ->limit(5)
                    ->get();

        return view('dashboard', compact(
            'totalAssetValue', 
            'activeLoans', 
            'lowStockCount', 
            'lateLoans', 
            'expiringItems', 
            'lowStocks'
        ));
    }
}