<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan Digital</title>
  <!-- Google Fonts & FontAwesome Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->

      <!-- Navbar -->
  <nav class="navbar">
    <div class="navbar-brand">
      <i class="fa-regular fa-bookmark"></i>
      <span>Perpustakaan Digital</span>
    </div>
    <div class="navbar-badge">
      Aplikasi Peminjaman Sederhana
    </div>
  </nav>

   <div class="container">
    <!-- Top Summary Cards -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon icon-blue">
          <i class="fa-regular fa-square"></i>
        </div>
        <div class="stat-info">
          <div class="label">Total Judul Buku</div>
          <div class="value">2</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon icon-green">
          <i class="fa-solid fa-layer-group"></i>
        </div>
        <div class="stat-info">
          <div class="label">Total Stok Tersedia</div>
          <div class="value">8</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon icon-amber">
          <i class="fa-solid fa-arrow-right-arrow-left"></i>
        </div>
        <div class="stat-info">
          <div class="label">Sedang Dipinjam</div>
          <div class="value">0</div>
        </div>
      </div>
    </div>

    
    <!-- Forms Row -->
    <div class="forms-grid">
      <!-- Form Tambah Buku -->
      <div class="card">
        <div class="card-title">
          <i class="fa-regular fa-circle-plus"></i>
          <span>Tambah Buku Baru</span>
        </div>
        <form>
          <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" class="form-control" placeholder="Contoh: Pemrograman Web">
          </div>
          <div class="form-group">
            <label>Kode ISBN</label>
            <input type="text" class="form-control" placeholder="Contoh: 978-602-1234-56-7">
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select class="form-control">
              <option value="">-- Pilih Kategori --</option>
              <option value="Teknologi">Teknologi</option>
              <option value="Novel">Novel</option>
            </select>
          </div>
          <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" class="form-control" placeholder="Contoh: 5">
          </div>
          <button type="button" class="btn btn-primary">Simpan Buku</button>
        </form>
      </div>

      <!-- Form Peminjaman Buku -->
      <div class="card">
        <div class="card-title">
          <i class="fa-regular fa-user"></i>
          <span>Form Peminjaman Buku</span>
        </div>
        <form>
          <div class="form-row">
            <div class="form-group">
              <label>Nama Peminjam</label>
              <input type="text" class="form-control" placeholder="Masukkan nama peminjam">
            </div>
            <div class="form-group">
              <label>Pilih Buku</label>
              <select class="form-control">
                <option value="">-- Pilih Buku yang Tersedia --</option>
              </select>
            </div>
          </div>
          <div class="form-row" style="align-items: flex-end;">
            <div class="form-group" style="margin-bottom: 0;">
              <label>Tanggal Pinjam</label>
              <input type="date" class="form-control" value="2026-10-08">
            </div>
            <div>
              <button type="button" class="btn btn-success">Proses Peminjaman</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Tabel Daftar Buku -->
    <div class="card table-card">
      <div class="card-title">
        <i class="fa-solid fa-chart-simple"></i>
        <span>Daftar Buku Perpustakaan</span>
      </div>
      <table class="data-table">
        <thead>
          <tr>
            <th>NO</th>
            <th>KODE ISBN</th>
            <th>JUDUL BUKU</th>
            <th>KATEGORI</th>
            <th>STOK</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>978-602-8519-93-9</td>
            <td><strong>Belajar JavaScript Modern</strong></td>
            <td><span class="badge-category">Teknologi</span></td>
            <td><span class="text-stock">5 unit</span></td>
            <td>
              <button class="btn-delete"><i class="fa-regular fa-trash-can"></i></button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>978-623-01-0001-1</td>
            <td><strong>Laskar Pelangi</strong></td>
            <td><span class="badge-category">Novel</span></td>
            <td><span class="text-stock">3 unit</span></td>
            <td>
              <button class="btn-delete"><i class="fa-regular fa-trash-can"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Tabel Riwayat Peminjaman -->
    <div class="card table-card">
      <div class="card-title">
        <i class="fa-solid fa-rotate-left"></i>
        <span>Riwayat & Status Peminjaman</span>
      </div>
      <table class="data-table">
        <thead>
          <tr>
            <th>NO</th>
            <th>NAMA PEMINJAM</th>
            <th>BUKU</th>
            <th>TGL PINJAM</th>
            <th>STATUS</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>lala</td>
            <td>Buku Dihapus</td>
            <td>2026-08-10</td>
            <td><span class="badge-status-returned">Dikembalikan</span></td>
            <td><span class="text-muted-italic">Selesai</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>