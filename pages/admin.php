<?php
// Proteksi Session: Hanya bisa diakses jika sudah login
if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] !== true) {
    echo "<script>alert('Akses ditolak! Silakan login terlebih dahulu.'); window.location='index.php?modul=login';</script>";
    exit;
}

// Mengambil semua data admin dari tabel admin_users
$query = "SELECT id, username, nama_lengkap FROM admin_users ORDER BY id ASC";
$result = mysqli_query($conn, $query);

$listAdmin = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $listAdmin[] = $row;
    }
} else {
    echo "<p style='color:red;'>Gagal memuat data dari database: " . mysqli_error($conn) . "</p>";
}
?>

<div class="page-header-flex">
    <div>
        <div class="hero-badge" style="margin-bottom: 8px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -1px;"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <span>Manajemen Hak Akses</span>
        </div>
        <h2 style="color: #0f172a; margin: 0; font-size: 1.45rem; font-weight: 700; letter-spacing: -0.02em;">Kelola Data Admin (CRUD)</h2>
        <p style="margin: 4px 0 0 0; color: #64748b; font-size: 0.88rem;">Daftar akun administrator yang memiliki hak akses pengelolaan sistem.</p>
    </div>
    <div>
        <a href="index.php?modul=admin_tambah" class="btn-primary-action">+ Tambah Admin Baru</a>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th style="width: 50px;">No</th>
            <th style="width: 180px;">Username</th>
            <th>Nama Lengkap</th>
            <th style="text-align: center; width: 140px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($listAdmin)): ?>
            <?php $no = 1;
            foreach ($listAdmin as $a): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                        <strong style="color: #0f172a;">@<?php echo htmlspecialchars($a['username']); ?></strong>
                    </td>
                    <td><?php echo htmlspecialchars($a['nama_lengkap']); ?></td>
                    <td style="text-align: center;">
                        <a href="index.php?modul=admin_edit&id=<?php echo $a['id']; ?>" class="btn-action btn-action-edit">Edit</a>
                        <a href="index.php?modul=admin_hapus&id=<?php echo $a['id']; ?>" class="btn-action btn-action-delete" onclick="return confirm('Yakin ingin menghapus admin ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align:center; padding: 28px; color: #64748b;">
                    <div style="margin-bottom: 8px; color: #94a3b8; display: flex; justify-content: center;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                    </div>
                    Belum ada data admin di database.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="table-meta-footer">
    <span>Total Administrator: <strong><?php echo count($listAdmin); ?></strong> Akun</span>
    <span>Proteksi Sesi: Aktif</span>
</div>

