<aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white border-r border-gray-200" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-white">
      <div class="mb-5 px-2">
        <span class="self-center text-xl font-semibold whitespace-nowrap text-blue-800">SIM INVENTARIS</span>
      </div>
      
      <ul class="space-y-2 font-medium">
         <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
               <span class="ms-3">Dashboard</span>
            </x-nav-link>
         </li>

         <div class="pt-4 pb-2 text-xs font-bold text-gray-400 uppercase">Aset & Barang</div>

         <li>
            <x-nav-link :href="route('inventaris.categories')" :active="request()->routeIs('inventaris*')">
               <span class="ms-3">Inventaris (Aset Tetap)</span>
            </x-nav-link>
         </li>

         <li>
            <x-nav-link :href="route('bhp.categories')" :active="request()->routeIs('bhp*')">
               <span class="ms-3">Barang Habis Pakai</span>
            </x-nav-link>
         </li>

         <div class="pt-4 pb-2 text-xs font-bold text-gray-400 uppercase">Akuisisi</div>

         <li>
            <x-nav-link :href="route('pengadaan.index')" :active="request()->routeIs('pengadaan*')">
               <span class="ms-3">Usulan Pengadaan</span>
            </x-nav-link>
         </li>

         <div class="pt-4 pb-2 text-xs font-bold text-gray-400 uppercase">Data Master</div>

         <li>
            <x-nav-link :href="route('ruangan.index')" :active="request()->routeIs('ruangan*')">
               <span class="ms-3">Ruangan</span>
            </x-nav-link>
         </li>

         <li>
            <x-nav-link :href="route('unit.index')" :active="request()->routeIs('unit*')">
               <span class="ms-3">Unit / Divisi</span>
            </x-nav-link>
         </li>

         <li>
            <x-nav-link :href="route('sumber-dana.index')" :active="request()->routeIs('sumber-dana*')">
               <span class="ms-3">Sumber Dana</span>
            </x-nav-link>
         </li>

         <div class="pt-4 pb-2 text-xs font-bold text-gray-400 uppercase">Sirkulasi</div>

         <li>
            <x-nav-link :href="route('transaksi.index')" :active="request()->routeIs('transaksi*')">
               <span class="ms-3">Transaksi BHP (Stok)</span>
            </x-nav-link>
         </li>

         <li>
            <x-nav-link :href="route('peminjaman.index')" :active="request()->routeIs('peminjaman*')">
               <span class="ms-3">Peminjaman Aset</span>
            </x-nav-link>
         </li>

         <div class="pt-4 pb-2 text-xs font-bold text-gray-400 uppercase">Pengaturan</div>

         <li>
            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users*')">
               <span class="ms-3">Manajemen Pengguna</span>
            </x-nav-link>
         </li>

         <div class="pt-4 pb-2 text-xs font-bold text-gray-400 uppercase">Laporan</div>

         <li>
            <x-nav-link :href="route('report.index')" :active="request()->routeIs('report*')">
               <span class="ms-3">Pusat Laporan (PDF)</span>
            </x-nav-link>
         </li>
         
         <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" 
                   class="flex items-center p-2 text-red-600 rounded-lg hover:bg-red-50 group cursor-pointer">
                   <span class="ms-3">Logout</span>
                </a>
            </form>
         </li>
      </ul>
   </div>
</aside>