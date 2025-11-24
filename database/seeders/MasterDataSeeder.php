<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Room;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Unit Fakultas Ilmu Komputer
        $fik = Unit::create([
            'name' => 'Fakultas Ilmu Komputer',
            'code' => 'FIK',
            'status' => 'aktif'
        ]);

        // Ruangan milik FIK
        Room::create(['unit_id' => $fik->id, 'name' => 'Lab. Rekayasa Perangkat Lunak', 'location' => 'Gedung B, Lt 2', 'status' => 'tersedia']);
        Room::create(['unit_id' => $fik->id, 'name' => 'Lab. Jaringan', 'location' => 'Gedung B, Lt 3', 'status' => 'tersedia']);
        Room::create(['unit_id' => $fik->id, 'name' => 'Ruang Dosen FIK', 'location' => 'Gedung A, Lt 1', 'status' => 'digunakan']);

        // 2. Unit BAAK
        $baak = Unit::create([
            'name' => 'Biro Administrasi (BAAK)',
            'code' => 'BAAK',
            'status' => 'aktif'
        ]);

        Room::create(['unit_id' => $baak->id, 'name' => 'Loket Pelayanan', 'location' => 'Gedung Pusat, Lt 1', 'status' => 'tersedia']);
        Room::create(['unit_id' => $baak->id, 'name' => 'Ruang Arsip', 'location' => 'Gedung Pusat, Lt 1', 'status' => 'tersedia']);

        // 3. Unit Sarpras
        $sarpras = Unit::create([
            'name' => 'Bagian Umum & Sarpras',
            'code' => 'SARPRAS',
            'status' => 'aktif'
        ]);

        Room::create(['unit_id' => $sarpras->id, 'name' => 'Gudang Inventaris Utama', 'location' => 'Gedung Belakang', 'status' => 'tersedia']);
    }
}