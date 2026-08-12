
<?php
// Query untuk mengambil seluruh data buku
$query = mysqli_query($koneksi, "SELECT * FROM buku");
?>
    <!-- Tabel Riwayat Peminjaman -->
<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/Buku.php';

$database = new Database();
$db = $database->getConnection();
$bukuModel = new Buku($db);
$bookList = $bukuModel->read()->fetchAll(PDO::FETCH_ASSOC);
?>

    <!-- Tabel Daftar Buku Perpustakaan  -->
    <!-- Tabel Riwayat Peminjaman -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
      <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 p-6 pb-4">
        <i class="fa-solid fa-rotate-left text-[#524bee]"></i> Riwayat & Status Peminjaman
      </h2>
      <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
          <thead class="bg-slate-50 border-y border-slate-200 text-[11px] font-bold text-slate-600 uppercase">
            <tr>
              <th class="px-6 py-3.5">NO</th>
              <th class="px-6 py-3.5">NAMA PEMINJAM</th>
              <th class="px-6 py-3.5">BUKU</th>
              <th class="px-6 py-3.5">TGL PINJAM</th>
              <th class="px-6 py-3.5">STATUS</th>
              <th class="px-6 py-3.5">AKSI</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr>
              <td class="px-6 py-4">1</td>
              <td class="px-6 py-4">lala</td>
              <td class="px-6 py-4 text-slate-600">Buku Dihapus</td>
              <td class="px-6 py-4 text-slate-500">2026-08-10</td>
              <td class="px-6 py-4"><span class="bg-emerald-100 text-emerald-600 px-3 py-1 rounded-full text-xs font-semibold">Dikembalikan</span></td>
              <td class="px-6 py-4"><span class="text-slate-400 italic">Selesai</span></td>
            </tr>
          </tbody>
             <tbody class="divide-y divide-slate-100">
            <?php if (count($bookList) > 0): ?>
              <?php foreach ($bookList as $index => $book): ?>
                <tr>
                  <td class="px-6 py-4"><?= $index + 1 ?></td>
                  <td class="px-6 py-4 text-slate-500"><?= htmlspecialchars($book['isbn']) ?></td>
                  <td class="px-6 py-4 font-bold"><?= htmlspecialchars($book['judul']) ?></td>
                  <td class="px-6 py-4"><span class="bg-slate-100 px-3 py-1 rounded-full text-xs"><?= htmlspecialchars($book['kategori']) ?></span></td>
                  <td class="px-6 py-4 font-semibold text-emerald-600"><?= htmlspecialchars($book['stok_tersedia']) ?> unit</td>
                  <td class="px-6 py-4"><button type="button" class="text-rose-500"><i class="fa-regular fa-trash-can"></i></button></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="px-6 py-4 text-center text-slate-500">Belum ada buku di perpustakaan.</td>
              </tr>
            <?php endif; ?>
           </tbody>
        </table>
      </div>
    </div>

  </div>