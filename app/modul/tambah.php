<?php
require_once __DIR__ . '/../config/db.php';

// 1. Inisialisasi Koneksi
$database = new Database();
$db = $database->getConnection();

// 2. PROSES PENANGANAN FORM (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_type = $_POST['form_type'] ?? '';

  // --- A. PROSES TAMBAH BUKU ---
if ($form_type === 'add_book') {
    $judul       = trim($_POST['judul'] ?? '');
    $isbn        = trim($_POST['isbn'] ?? '');
    $id_kategori = trim($_POST['id_kategori'] ?? '');
    $stok        = (int)($_POST['stok'] ?? 0); // <-- Diubah dari 'stok_tersedia' ke 'stok'

    if (!empty($judul) && !empty($isbn) && !empty($id_kategori) && $stok > 0) {
        try {
            $query = "INSERT INTO tb_buku (judul, isbn, id_kategori, stok_tersedia) VALUES (:judul, :isbn, :id_kategori, :stok_tersedia)";
            $stmt  = $db->prepare($query);
            
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->bindParam(':id_kategori', $id_kategori);
            $stmt->bindParam(':stok_tersedia', $stok);

            if ($stmt->execute()) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
        } catch (PDOException $e) {
            echo "<script>alert('Gagal menyimpan buku: " . addslashes($e->getMessage()) . "');</script>";
        }
    } else {
        echo "<script>alert('Mohon lengkapi semua field tambah buku!');</script>";
    }
}
    // --- B. PROSES PEMINJAMAN BUKU ---
    if ($form_type === 'borrow_book') {
        $nama       = trim($_POST['nama'] ?? '');
        $id_buku    = trim($_POST['id_buku'] ?? '');
        $tgl_pinjam = trim($_POST['tgl_pinjam'] ?? '');

        if (!empty($nama) && !empty($id_buku) && !empty($tgl_pinjam)) {
            try {
                // Simpan transaksi peminjaman
                $query_pinjam = "INSERT INTO tb_peminjaman (nama, id_buku, tgl_pinjam) VALUES (:nama, :id_buku, :tgl_pinjam)";
                $stmt = $db->prepare($query_pinjam);
                $stmt->bindParam(':nama', $nama);
                $stmt->bindParam(':id_buku', $id_buku);
                $stmt->bindParam(':tgl_pinjam', $tgl_pinjam);

                if ($stmt->execute()) {
                    // Otomatis potong stok tersedianya 1
                    $query_stok = "UPDATE tb_buku SET stok_tersedia = stok_tersedia - 1 WHERE id = :id_buku AND stok_tersedia > 0";
                    $stmt_stok = $db->prepare($query_stok);
                    $stmt_stok->bindParam(':id_buku', $id_buku);
                    $stmt_stok->execute();

                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                }
            } catch (PDOException $e) {
                echo "<script>alert('Gagal memproses peminjaman: " . addslashes($e->getMessage()) . "');</script>";
            }
        } else {
            echo "<script>alert('Mohon lengkapi semua field peminjaman!');</script>";
        }
    }
}
?>

<!-- Forms Row -->
<div class="grid grid-cols-1 lg:grid-cols-[1fr_1.6fr] gap-5 items-start">
  
  <!-- Form Tambah Buku -->
  <div class="bg-white border border-slate-200 rounded-xl p-6">
    <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-5">
      <i class="fa-regular fa-square-plus text-[#524bee]"></i> Tambah Buku Baru
    </h2>
    <form method="POST" action="" class="space-y-4 text-xs font-semibold text-slate-600">
      <input type="hidden" name="form_type" value="add_book">

      <div>
        <label class="block mb-1.5">Judul Buku</label>
        <input type="text" name="judul" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: Pemrograman Web" required>
      </div>

      <div>
        <label class="block mb-1.5">Kode ISBN</label>
        <input type="text" name="isbn" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: 978-602-1234-56-7" required>
      </div>

      <div>
        <label class="block mb-1.5">Kategori</label>
        <select name="id_kategori" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white" required>
          <option value="">-- Pilih Kategori --</option>
          <?php
            $sqlkategori = $db->query("SELECT * FROM tb_kategori");
            if ($sqlkategori) {
                foreach ($sqlkategori as $oy) {
                    ?>
                    <option value="<?= htmlspecialchars($oy['id_kategori']) ?>">
                      <?= htmlspecialchars($oy['kategori']) ?>
                    </option>
                    <?php
                }
            }
          ?>
        </select>
      </div>

      <div>
        <label class="block mb-1.5">Jumlah Stok</label>
        <input type="number" name="stok" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: 5" min="1" required>
      </div>
      
      <button type="submit" class="w-full py-2.5 bg-[#524bee] hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg">Simpan Buku</button>
    </form>
  </div>



  
  <!-- Form Peminjaman Buku -->
  <div class="bg-white border border-slate-200 rounded-xl p-6">
    <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-5">
      <i class="fa-regular fa-user text-[#524bee]"></i> Form Peminjaman Buku
    </h2>
    <form method="POST" action="" class="space-y-4 text-xs font-semibold text-slate-600">
      <input type="hidden" name="form_type" value="borrow_book">

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
              $sqlbuku = $db->query("SELECT * FROM tb_buku WHERE stok_tersedia > 0");
              if ($sqlbuku) {
                  foreach ($sqlbuku as $databuku) {
                      ?>
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
        <button type="submit" class="w-full py-2.5 bg-[#059669] hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg">Proses Peminjaman</button>
      </div>
    </form>
  </div>

</div>