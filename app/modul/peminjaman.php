<?php
// Ambil koneksi dari $db yang sudah kita inisialisasi sebelumnya
$db_koneksi = isset($db) ? $db : (isset($conn) ? $conn : null);

// --- PROSES SIMPAN PEMINJAMAN ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_pinjam'])) {
    $nama       = trim($_POST['nama'] ?? '');
    $id_buku    = trim($_POST['id_buku'] ?? '');
    $tgl_pinjam = trim($_POST['tgl_pinjam'] ?? '');

    if (!empty($nama) && !empty($id_buku) && !empty($tgl_pinjam)) {
        try {
            // 1. Simpan data peminjaman
            $query_pinjam = "INSERT INTO tb_peminjaman (nama, id_buku, tgl_pinjam) VALUES (:nama, :id_buku, :tgl_pinjam)";
            $stmt = $db_koneksi->prepare($query_pinjam);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':id_buku', $id_buku);
            $stmt->bindParam(':tgl_pinjam', $tgl_pinjam);

            if ($stmt->execute()) {
                // 2. Kurangi stok_tersedia buku sebanyak 1
                $query_stok = "UPDATE tb_buku SET stok_tersedia = stok_tersedia - 1 WHERE id = :id_buku AND stok_tersedia > 0";
                $stmt_stok = $db_koneksi->prepare($query_stok);
                $stmt_stok->bindParam(':id_buku', $id_buku);
                $stmt_stok->execute();

                echo "<script>alert('Peminjaman berhasil diproses!'); window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
                exit;
            }
        } catch (PDOException $e) {
            echo "<script>alert('Gagal menyimpan: " . addslashes($e->getMessage()) . "');</script>";
        }
    } else {
        echo "<script>alert('Mohon lengkapi semua data peminjaman!');</script>";
    }
}
?>

<!-- Form Peminjaman Buku -->
<div class="bg-white border border-slate-200 rounded-xl p-6">
  <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-5">
    <i class="fa-regular fa-user text-[#524bee]"></i> Form Peminjaman Buku
  </h2>
  
  <!-- Ditambahkan method="POST" -->
  <form method="POST" action="" class="space-y-4 text-xs font-semibold text-slate-600">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label class="block mb-1.5">Nama Peminjam</label>
        <input type="text" name="nama" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Masukkan nama peminjam" required>
      </div>
      <div>
        <label class="block mb-1.5">Pilih Buku</label>
        <select name="id_buku" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white" required>
          <option value="">-- Pilih Buku yang Tersedia --</option>
          <?php
            // Memakai kolom stok_tersedia
            $sqlbuku = $db_koneksi->query("SELECT * FROM tb_buku WHERE stok_tersedia > 0");
            if ($sqlbuku) {
                foreach ($sqlbuku as $databuku) {
                    ?>
                    <!-- value menggunakan $databuku['id'] -->
                    <option value="<?= htmlspecialchars($databuku['id']) ?>">
                      <?= htmlspecialchars($databuku['judul']) ?> (Stok: <?= htmlspecialchars($databuku['stok_tersedia']) ?>)
                    </option>
                    <?php
                }
            }
          ?>
        </select>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
      <div>
        <label class="block mb-1.5">Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white" value="<?= date('Y-m-d') ?>" required>
      </div>
      
      <!-- Diubah ke type="submit" dan diberi name="btn_pinjam" -->
      <button type="submit" name="btn_pinjam" class="w-full py-2.5 bg-[#059669] hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg">Proses Peminjaman</button>
    </div>
  </form>
</div>