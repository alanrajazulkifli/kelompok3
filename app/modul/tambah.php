<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/Buku.php';

$message = '';
$formValues = [
    'judul' => '',
    'isbn' => '',
    'kategori' => '',
    'stok_tersedia' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'add_book') {
    $formValues = [
        'judul' => trim($_POST['judul'] ?? ''),
        'isbn' => trim($_POST['isbn'] ?? ''),
        'kategori' => trim($_POST['kategori'] ?? ''),
        'stok_tersedia' => trim($_POST['stok_tersedia'] ?? ''),
    ];

    if ($formValues['judul'] === '' || $formValues['isbn'] === '' || $formValues['kategori'] === '' || $formValues['stok_tersedia'] === '') {
        $message = 'Semua field harus diisi.';
    } else {
        $database = new Database();
        $db = $database->getConnection();
        $bukuModel = new Buku($db);
        $bukuModel->isbn = $formValues['isbn'];
        $bukuModel->judul = $formValues['judul'];
        $bukuModel->kategori = $formValues['kategori'];
        $bukuModel->stok_tersedia = (int)$formValues['stok_tersedia'];

        if ($bukuModel->create()) {
            $message = 'Buku berhasil disimpan.';
            $formValues = [
                'judul' => '',
                'isbn' => '',
                'kategori' => '',
                'stok_tersedia' => '',
            ];
        } else {
            $message = 'Gagal menyimpan buku. Periksa input dan coba lagi.';
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
    <?php if ($message): ?>
      <div class="mb-4 rounded-lg bg-rose-50 border border-rose-100 p-4 text-sm text-rose-700"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <form method="post" class="space-y-4 text-xs font-semibold text-slate-600">
      <input type="hidden" name="form_type" value="add_book">
      <div>
        <label class="block mb-1.5">Judul Buku</label>
        <input name="judul" type="text" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: Pemrograman Web" value="<?= htmlspecialchars($formValues['judul']) ?>">
      </div>
      <div>
        <label class="block mb-1.5">Kode ISBN</label>
        <input name="isbn" type="text" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: 978-602-1234-56-7" value="<?= htmlspecialchars($formValues['isbn']) ?>">
      </div>
      <div>
        <label class="block mb-1.5">Kategori</label>
        <select name="kategori" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white">
          <option value="">-- Pilih Kategori --</option>
          <option value="Teknologi" <?= $formValues['kategori'] === 'Teknologi' ? 'selected' : '' ?>>Teknologi</option>
          <option value="Novel" <?= $formValues['kategori'] === 'Novel' ? 'selected' : '' ?>>Novel</option>
        </select>
      </div>
      <div>
        <label class="block mb-1.5">Jumlah Stok</label>
        <input name="stok_tersedia" type="number" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Contoh: 5" value="<?= htmlspecialchars($formValues['stok_tersedia']) ?>">
      </div>
      <button type="submit" class="w-full py-2.5 bg-[#524bee] hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg">Simpan Buku</button>
    </form>
  </div>
