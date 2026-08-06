# kelompok3
github untuk pengumpulan tugas dari pak rudi
Tabel BUKU

db_perpustakaan
tb_buku
id (Primary Key)
isbn
judul
kategori
stok_tersedia

Tabel PEMINJAMAN
tb_peminjam
id (Primary Key)
buku_id (Foreign Key → BUKU.id)
peminjam
tgl_jatuh_tempo
status (dipinjam / selesai)