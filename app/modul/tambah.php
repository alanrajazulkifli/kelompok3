
    <!-- Forms Row -->
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.6fr] gap-5">
      <!-- Form Tambah Buku -->
      <div class="bg-white border border-slate-200 rounded-xl p-6">
        <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-5">
          <i class="fa-regular fa-circle-plus text-[#524bee]"></i> Tambah Buku Baru
        </h2>
        <form class="space-y-4 text-xs font-semibold text-slate-600">
          <div>
            <label class="block mb-1.5">Judul Buku</label>
            <input type="text" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: Pemrograman Web">
          </div>
          <div>
            <label class="block mb-1.5">Kode ISBN</label>
            <input type="text" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: 978-602-1234-56-7">
          </div>
          <div>
            <label class="block mb-1.5">Kategori</label>
            <select class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white">
              <option value="">-- Pilih Kategori --</option>
              <option value="Teknologi">Teknologi</option>
              <option value="Novel">Novel</option>
            </select>
          </div>
          <div>
            <label class="block mb-1.5">Jumlah Stok</label>
            <input type="number" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: 5">
          </div>
          <button type="button" class="w-full py-2.5 bg-[#524bee] hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg">Simpan Buku</button>
        </form>
      </div>


      
    <!-- Tabel Daftar Buku -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
      <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 p-6 pb-4">
        <i class="fa-solid fa-chart-simple text-[#524bee]"></i> Daftar Buku Perpustakaan
      </h2>
      <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
          <thead class="bg-slate-50 border-y border-slate-200 text-[11px] font-bold text-slate-600 uppercase">
            <tr>
              <th class="px-6 py-3.5">NO</th>
              <th class="px-6 py-3.5">KODE ISBN</th>
              <th class="px-6 py-3.5">JUDUL BUKU</th>
              <th class="px-6 py-3.5">KATEGORI</th>
              <th class="px-6 py-3.5">STOK</th>
              <th class="px-6 py-3.5">AKSI</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr>
              <td class="px-6 py-4">1</td>
              <td class="px-6 py-4 text-slate-500">978-602-8519-93-9</td>
              <td class="px-6 py-4 font-bold">Belajar JavaScript Modern</td>
              <td class="px-6 py-4"><span class="bg-slate-100 px-3 py-1 rounded-full text-xs">Teknologi</span></td>
              <td class="px-6 py-4 font-semibold text-emerald-600">5 unit</td>
              <td class="px-6 py-4"><button class="text-rose-500"><i class="fa-regular fa-trash-can"></i></button></td>
            </tr>
            <tr>
              <td class="px-6 py-4">2</td>
              <td class="px-6 py-4 text-slate-500">978-623-01-0001-1</td>
              <td class="px-6 py-4 font-bold">Laskar Pelangi</td>
              <td class="px-6 py-4"><span class="bg-slate-100 px-3 py-1 rounded-full text-xs">Novel</span></td>
              <td class="px-6 py-4 font-semibold text-emerald-600">3 unit</td>
              <td class="px-6 py-4"><button class="text-rose-500"><i class="fa-regular fa-trash-can"></i></button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
