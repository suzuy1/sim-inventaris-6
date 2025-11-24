<?php
namespace App\Http\Controllers;
use App\Models\AssetDetail;
use App\Models\Inventory;
use App\Models\FundingSource;
use Illuminate\Http\Request;

class AssetDetailController extends Controller
{
    // Halaman 3: Tabel Detail Unit (Acer, Asus, dll)
    public function index(Inventory $inventory) {
        // Load data master untuk dropdown form
        $rooms = \App\Models\Room::with('unit')->get(); 
        $fundings = \App\Models\FundingSource::all();
        
        // Ambil list unit milik barang ini
       // Ganti latest() menjadi oldest()
$details = $inventory->details()->with(['room', 'fundingSource'])->oldest()->get();
        
        return view('pages.inventories.details', compact('inventory', 'details', 'rooms', 'fundings'));
    }

   public function store(Request $request) {
        $request->validate([
            'inventory_id' => 'required',
            'model_name' => 'required',
            'room_id' => 'required',
            'funding_source_id' => 'required',
            'condition' => 'required',
            'price' => 'nullable|numeric',
            'purchase_date' => 'nullable|date',
            'repair_date' => 'nullable|date',
            'check_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        // 1. AMBIL DATA PENDUKUNG
        // Kita butuh data Induk untuk tahu Category ID-nya
        $inventory = Inventory::findOrFail($request->inventory_id);
        
        // Kita butuh Kode Sumber Dana (misal: BOS, YYS)
        $sumber = FundingSource::findOrFail($request->funding_source_id);

        // 2. LOGIKA NOMOR URUT (001, 002, dst)
        // Hitung berapa unit yang SUDAH ADA di inventaris induk ini
        $jumlahUnitSaatIni = AssetDetail::where('inventory_id', $inventory->id)->count();
        
        // Urutan selanjutnya = Jumlah sekarang + 1
        $nomorUrut = $jumlahUnitSaatIni + 1;
        
        // Format jadi 3 digit (1 jadi 001, 10 jadi 010)
        $sequence = str_pad($nomorUrut, 3, '0', STR_PAD_LEFT);

        // 3. RAKIT KODE UNIT (Sesuai Permintaan: INV / SUMBER / CAT_ID / 001)
        $generatedCode = "INV/" . $sumber->code . "/" . $inventory->category_id . "/" . $sequence;

        // 4. SIMPAN DATA SEKALIGUS
        // Kita merge request dengan array kode unit yang baru dibuat
        AssetDetail::create(array_merge($request->all(), ['unit_code' => $generatedCode]));

        return back()->with('success', 'Unit Aset berhasil ditambahkan. Kode: ' . $generatedCode);
    }
    
    public function destroy(AssetDetail $assetDetail) {
        $assetDetail->delete();
        return back()->with('success', 'Unit dihapus.');
    }
}