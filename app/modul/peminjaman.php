      <!-- Form Peminjaman Buku -->
      <div class="bg-white border border-slate-200 rounded-xl p-6">
        <h2 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-5">
          <i class="fa-regular fa-user text-[#524bee]"></i> Form Peminjaman Buku
        </h2>
        <form class="space-y-4 text-xs font-semibold text-slate-600">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block mb-1.5">Nama Peminjam</label>
              <input type="text" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee]" placeholder="Masukkan nama peminjam">
            </div>
            <div>
              <label class="block mb-1.5">Pilih Buku</label>
              <select class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white">
                <option value="">-- Pilih Buku yang Tersedia --</option>
              </select>
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
            <div>
              <label class="block mb-1.5">Tanggal Pinjam</label>
              <input type="date" class="w-full p-2.5 text-sm font-normal border border-slate-300 rounded-lg outline-none focus:border-[#524bee] bg-white" value="2026-10-08">
            </div>
            <button type="button" class="w-full py-2.5 bg-[#059669] hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg">Proses Peminjaman</button>
          </div>
        </form>
      </div>
    </div>