<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/Buku.php';

$database = new Database();
$db = $database->getConnection();
$bukuModel = new Buku($db);
$availableBooks = $bukuModel->read()->fetchAll(PDO::FETCH_ASSOC);
$defaultDueDate = date('Y-m-d', strtotime('+7 days'));
?>

  <!-- Form Peminjaman Buku -->
  <div class="bg-white border border-slate-200 rounded-xl p-6">
    <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-5">
      <i class="fa-regular fa-user text-[#524bee]"></i> Form Peminjaman Buku
    </h2>
    <form method="post" class="space-y-4 text-xs font-semibold text-slate-600">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block mb-1.5">Nama Peminjam</label>
          <input name="peminjaman" type="text" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Masukkan nama peminjam">
        </div>
        <div>
          <label class="block mb-1.5">Pilih Buku</label>
          <select name="buku_id" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white">
            <option value="">-- Pilih Buku yang Tersedia --</option>
            <?php if (count($availableBooks) > 0): ?>
              <?php foreach ($availableBooks as $book): ?>
                <?php if ((int)$book['stok_tersedia'] > 0): ?>
                  <option value="<?= htmlspecialchars($book['id']) ?>">
                    <?= htmlspecialchars($book['judul']) ?> (<?= htmlspecialchars($book['stok_tersedia']) ?> tersedia)
                  </option>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php else: ?>
              <option value="" disabled>Data buku belum tersedia.</option>
            <?php endif; ?>
          </select>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
        <div>
          <label class="block mb-1.5">Tanggal Jatuh Tempo</label>
          <input name="tgl_jatuh_tempo" type="date" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white" value="<?= $defaultDueDate ?>">
        </div>
        <button type="submit" class="w-full py-2.5 bg-[#059669] hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg">Proses Peminjaman</button>
      </div>
      <input type="hidden" name="status" value="dipinjam">
    </form>
  </div>

</div>