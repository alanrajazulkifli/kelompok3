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
     <?php
      include "../modul/kategori.php";
      include "../modul/tambah.php";
      include "../modul/peminjaman.php";
      include "../modul/tabletambah.php";
      include "../modul/tablepinjam.php";
        ?>
    
    <!-- Tabel Daftar Buku -->
    <!-- Tabel Riwayat Peminjaman -->
  

  </div>

</body>
</html>