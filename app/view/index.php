<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan Digital</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-['Inter'] text-slate-800 pb-10">

  <!-- Navbar -->
  <nav class="bg-[#524bee] text-white px-8 py-4 flex justify-between items-center">
    <div class="flex items-center gap-2 text-xl font-bold">
      <i class="fa-regular fa-bookmark"></i>
      <span>Perpustakaan Digital</span>
    </div>
    <span class="bg-white/20 px-4 py-1.5 rounded-full text-xs font-medium">Aplikasi Peminjaman Sederhana</span>
  </nav>

  <div class="max-w-[1200px] mx-auto mt-8 px-5 space-y-6">
    
    <!-- Top Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
      <div class="bg-white border border-slate-200 rounded-xl p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center text-xl"><i class="fa-regular fa-square"></i></div>
        <div>
          <p class="text-xs font-semibold text-slate-500">Total Judul Buku</p>
          <p class="text-2xl font-bold">2</p>
        </div>
      </div>
      <div class="bg-white border border-slate-200 rounded-xl p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl"><i class="fa-solid fa-layer-group"></i></div>
        <div>
          <p class="text-xs font-semibold text-slate-500">Total Stok Tersedia</p>
          <p class="text-2xl font-bold">8</p>
        </div>
      </div>
      <div class="bg-white border border-slate-200 rounded-xl p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center text-xl"><i class="fa-solid fa-arrow-right-arrow-left"></i></div>
        <div>
          <p class="text-xs font-semibold text-slate-500">Sedang Dipinjam</p>
          <p class="text-2xl font-bold">0</p>
        </div>
      </div>
    </div>

    <!-- Forms Row -->
<<<<<<< HEAD
    <!-- Form Tambah Buku -->
    <!-- Tabel Daftar Buku -->
=======
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


>>>>>>> 6ca90d49960253715ce24c844cbd1a6fbc64d059
    <!-- Tabel Riwayat Peminjaman -->
  

  </div>

</body>
</html>