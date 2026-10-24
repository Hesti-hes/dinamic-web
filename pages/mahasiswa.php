<?php
// Mengambil data secara langsung dari tabel database menggunakan MySQLi
// Menggunakan LEFT JOIN untuk mengambil nama_prodi dari tabel prodi berdasarkan relasi prodi_id
$query = "SELECT biodata_mhs.*, prodi.nama_prodi 
          FROM biodata_mhs 
          LEFT JOIN prodi ON biodata_mhs.prodi_id = prodi.id 
          ORDER BY biodata_mhs.id DESC";
$result = mysqli_query($conn, $query);

$listMhs = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $listMhs[] = $row;
    }
} else {
    echo "<p style='color:red;'>Gagal memuat data dari database: " . mysqli_error($conn) . "</p>";
}
?>

<div class="page-header-flex">
    <div>
        <div class="hero-badge" style="margin-bottom: 8px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -1px;"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            <span>Pengelolaan Data</span>
        </div>
        <h2 style="color: #0f172a; margin: 0; font-size: 1.45rem; font-weight: 700; letter-spacing: -0.02em;">Daftar Mahasiswa Aktif (CRUD)</h2>
        <p style="margin: 4px 0 0 0; color: #64748b; font-size: 0.88rem;">Data mahasiswa dikelola secara penuh melalui operasi database MySQLi dengan relasi tabel.</p>
    </div>
    <div>
        <a href="index.php?modul=mahasiswa_tambah" class="btn-primary-action">+ Tambah Mahasiswa Baru</a>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th style="width: 50px;">No</th>
            <th>NIM</th>
            <th>Nama Lengkap</th>
            <th>Program Studi</th>
            <th style="width: 80px;">IPK</th>
            <th style="text-align: center; width: 140px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($listMhs)): ?>
            <?php $no = 1;
            foreach ($listMhs as $m): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><strong><?php echo htmlspecialchars($m['nim']); ?></strong></td>
                    <td><?php echo htmlspecialchars($m['nama']); ?></td>
                    <td>
                        <?php
                        // Menampilkan nama prodi dari tabel relasi, jika kosong tampilkan pesan default
                        echo !empty($m['nama_prodi']) ? htmlspecialchars($m['nama_prodi']) : '<em style="color:#94a3b8;">Belum diatur</em>';
                        ?>
                    </td>
                    <td>
                        <span class="badge-ipk"><?php echo htmlspecialchars($m['ipk']); ?></span>
                    </td>
                    <td style="text-align: center;">
                        <a href="index.php?modul=mahasiswa_edit&id=<?php echo $m['id']; ?>" class="btn-action btn-action-edit">Edit</a>
                        <a href="index.php?modul=mahasiswa_hapus&id=<?php echo $m['id']; ?>" class="btn-action btn-action-delete" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align:center; padding: 28px; color: #64748b;">
                    <div style="margin-bottom: 8px; color: #94a3b8; display: flex; justify-content: center;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                    </div>
                    Belum ada rekaman data mahasiswa di database.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="table-meta-footer">
    <span>Total Mahasiswa Terdaftar: <strong><?php echo count($listMhs); ?></strong></span>
    <span>Sistem Database: MySQLi</span>
</div>