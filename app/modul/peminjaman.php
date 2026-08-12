      
      
      <!-- Form Peminjaman Buku -->
      <div class="bg-white border border-slate-200 rounded-xl p-6">
        <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-5">
          <i class="fa-regular fa-user text-[#524bee]"></i> Form Peminjaman Buku
        </h2>
        <form class="space-y-4 text-xs font-semibold text-slate-600">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block mb-1.5">Nama Peminjam</label>
              <input type="text" name="nama" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Masukkan nama peminjam">
            </div>
            <div>
              <label class="block mb-1.5">Pilih Buku</label>
              <select name="id_buku" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white">
                <option value="">-- Pilih Buku yang Tersedia --</option>
                <?php
                  // Ambil data buku yang tersedia
                  $sqlbuku = $conn->query("SELECT * FROM tb_buku WHERE stok > 0");
                  while ($databuku = $sqlbuku->fetch_assoc()) {
                      ?>
                      <option value="<?= htmlspecialchars($databuku['id_buku']) ?>">
                        <?= htmlspecialchars($databuku['judul']) ?> (Stok: <?= htmlspecialchars($databuku['stok']) ?>)
                      </option>
                      <?php
                  }
                  ?>
              </select>
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
            <div>
              <label class="block mb-1.5">Tanggal Pinjam</label>
              <input type="date" name="tgl_pinjam" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white" value="2026-10-08">
            </div>
            <button type="button" class="w-full py-2.5 bg-[#059669] hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg">Proses Peminjaman</button>
          </div>
        </form>
      </div>
    </div>

  <?php
    if (isset($_POST['btn'])) {
      $path = '../upload/';
      $nama = $_POST['nama'];
      $id_buku = $_POST['id_buku'];
      $tgl_pinjam = $_POST['tgl_pinjam'];
      $sql = $conn->query("INSERT INTO tb_peminjaman(nama,id_buku,tgl_pinjam) VALUES('$nama','$id_buku','$tgl_pinjam')");

      if ($sql==true) {
        echo"Data Berhasil Di Input...";
      }else {
        echo"<b>Error..</b>".$conn->error."";
      }
   }
    ?>