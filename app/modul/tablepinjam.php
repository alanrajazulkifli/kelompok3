<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/Buku.php';

$database = new Database();
$db = $database->getConnection();
$bukuModel = new Buku($db);
$bookList = $bukuModel->read()->fetchAll(PDO::FETCH_ASSOC);
?>

    <!-- Tabel Daftar Buku Perpustakaan -->
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