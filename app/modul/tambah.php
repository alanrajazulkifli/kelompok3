<!-- Forms Row -->
<div class="grid grid-cols-1 lg:grid-cols-[1fr_1.6fr] gap-5 items-start">
  
  <!-- Form Tambah Buku -->
  <div class="bg-white border border-slate-200 rounded-xl p-6">
    <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-5">
      <i class="fa-regular fa-square-plus text-[#524bee]"></i> Tambah Buku Baru
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
