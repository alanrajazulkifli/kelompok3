<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/Buku.php';

// Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

// --- PROSES SIMPAN BUKU KE DATABASE ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'add_book') {
    $judul       = trim($_POST['judul'] ?? '');
    $isbn        = trim($_POST['isbn'] ?? '');
    $id_kategori = trim($_POST['id_kategori'] ?? '');
    
    // PERBAIKAN: Mengambil $_POST['stok'] sesuai atribut name di HTML
    $stok        = (int)($_POST['stok'] ?? 0); 

    // Cek jika seluruh field tidak kosong
    if (!empty($judul) && !empty($isbn) && !empty($id_kategori) && $stok > 0) {
        try {
            // Memasukkan data ke kolom stok_tersedia
            $query = "INSERT INTO tb_buku (judul, isbn, id_kategori, stok_tersedia) VALUES (:judul, :isbn, :id_kategori, :stok_tersedia)";
            $stmt  = $db->prepare($query);

            // Bind nilai
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->bindParam(':id_kategori', $id_kategori);
            $stmt->bindParam(':stok_tersedia', $stok);

            if ($stmt->execute()) {
                // Refresh halaman agar data baru langsung muncul di tabel
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
        } catch (PDOException $e) {
            echo "<script>alert('Gagal menyimpan: " . addslashes($e->getMessage()) . "');</script>";
        }
    } else {
        echo "<script>alert('Mohon isi semua data form dengan benar!');</script>";
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
<<<<<<< HEAD
          // Ambil data kategori dari database
          $queryKategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
          while ($kategori = mysqli_fetch_assoc($queryKategori)) {
              echo '<option value="' . $kategori['id_kategori'] . '">' . $kategori['kategori'] . '</option>';
          }
          ?>
          
         
=======
            // Ambil data kategori
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
>>>>>>> d2dd899d86b822d626746a6311f795b24510b0ae
        </select>
      </div>

      <div>
        <label class="block mb-1.5">Jumlah Stok</label>
        <!-- name="stok" dipadankan dengan $_POST['stok'] -->
        <input type="number" name="stok" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: 5" min="1" required>
      </div>
      
      <button type="submit" class="w-full py-2.5 bg-[#524bee] hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg">Simpan Buku</button>
    </form>
  </div>

</div>