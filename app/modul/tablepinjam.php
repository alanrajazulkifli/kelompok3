
  <!-- 2. Tabel Riwayat Peminjaman -->
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
          <?php
          $queryPinjam = "SELECT p.*, b.judul 
                          FROM tb_peminjaman p 
                          LEFT JOIN tb_buku b ON p.id_buku = b.id 
                          ORDER BY p.id DESC";
          $stmtPinjam = $db->query($queryPinjam);
          $noP = 1;

          if ($stmtPinjam && $stmtPinjam->rowCount() > 0):
            while ($p = $stmtPinjam->fetch(PDO::FETCH_ASSOC)):
              $status = $p['status'] ?? 'Dipinjam'; 
          ?>
            <tr>
              <td class="px-6 py-4"><?= $noP++ ?></td>
              <td class="px-6 py-4"><?= htmlspecialchars($p['nama']) ?></td>
              <td class="px-6 py-4 text-slate-600">
                <?= htmlspecialchars($p['judul'] ?? 'Buku Dihapus') ?>
              </td>
              <td class="px-6 py-4 text-slate-500"><?= htmlspecialchars($p['tgl_pinjam']) ?></td>
              <td class="px-6 py-4">
                <?php if ($status === 'Dikembalikan'): ?>
                  <span class="bg-emerald-100 text-emerald-600 px-3 py-1 rounded-full text-xs font-semibold">Dikembalikan</span>
                <?php else: ?>
                  <span class="bg-amber-100 text-amber-600 px-3 py-1 rounded-full text-xs font-semibold">Dipinjam</span>
                <?php endif; ?>
              </td>
              <td class="px-6 py-4">
                <?php if ($status === 'Dikembalikan'): ?>
                  <span class="text-slate-400 italic">Selesai</span>
                <?php else: ?>
                  <a href="?kembali_id=<?= $p['id'] ?>&id_buku=<?= $p['id_buku'] ?>" class="text-indigo-600 font-semibold hover:underline">Kembalikan</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php 
            endwhile;
          else: 
          ?>
            <tr>
              <td colspan="6" class="px-6 py-4 text-center text-slate-400">Belum ada riwayat peminjaman.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>