<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/kategori.php'; // Memanggil model Kategori yang benar

// Instansiasi Model Kategori
$database = new database();
$db = $database->getConnection();
$kategoriModel = new Kategori($db);


// Proses saat form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'add_category') {
    $nama_kategori = trim($_POST['nama_kategori'] ?? '');

    if ($nama_kategori === '') {
        $message = 'Nama kategori tidak boleh kosong.';
        $status = 'error';
    } else {
        $kategoriModel->nama_kategori = $nama_kategori;

        if ($kategoriModel->create()) {
            $message = 'Kategori berhasil ditambahkan.';
            $status = 'success';
        } else {
            $message = 'Gagal menambahkan kategori. Coba lagi.';
            $status = 'error';
        }
    }
}
?>

<!-- Form Container --> 
<div class="w-full">
  <!-- Form Tambah Kategori -->
  <div class="bg-white border border-slate-200 rounded-xl p-6">
    <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-5">
      <i class="fa-regular fa-square-plus text-[#524bee]"></i> Tambah Kategori
    </h2>

    <!-- Alert Notifikasi -->
    <?php if (!empty($message)): ?>
      <div class="mb-4 p-3.5 text-sm rounded-lg border <?= $status === 'success' ? 'bg-emerald-50 border-emerald-200 text-emerald-700' : 'bg-rose-50 border-rose-200 text-rose-700' ?>">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form action="" method="POST" class="space-y-4 text-xs font-semibold text-slate-600">
      <!-- Hidden Input Penanda Form -->
      <input type="hidden" name="form_type" value="add_category">

      <div>
        <label class="block mb-1.5">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: Teknologi" required>
      </div>

      <!-- Ubah type menjadi submit -->
      <button type="submit" class="w-full py-2.5 bg-[#524bee] hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg">Simpan Kategori</button>
    </form>
  </div>
</div>