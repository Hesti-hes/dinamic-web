<?php
// Ambil daftar program studi untuk dropdown
$queryProdi = "SELECT * FROM prodi ORDER BY nama_prodi ASC";
$resultProdi = mysqli_query($conn, $queryProdi);

if (isset($_POST['submit'])) {
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    // Menangkap prodi_id dari dropdown
    $prodi_id = mysqli_real_escape_string($conn, $_POST['prodi_id']);
    $ipk = mysqli_real_escape_string($conn, $_POST['ipk']);

    // Ambil nama_prodi dari tabel prodi agar kolom prodi (varchar) di database ikut tersinkronisasi
    $qProdi = mysqli_query($conn, "SELECT nama_prodi FROM prodi WHERE id = '$prodi_id'");
    $dataProdi = mysqli_fetch_assoc($qProdi);
    $nama_prodi = $dataProdi['nama_prodi'] ?? '';

    // Insert ke database, simpan angka prodi_id dan teks nama_prodi
    $query = "INSERT INTO biodata_mhs (nim, nama, prodi_id, prodi, ipk) VALUES ('$nim', '$nama', '$prodi_id', '$nama_prodi', '$ipk')";
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        echo "<script>alert('Data mahasiswa berhasil ditambahkan!'); window.location='index.php?modul=mahasiswa';</script>";
    } else {
        echo "<p style='color:red;'>Gagal menambah data: " . mysqli_error($conn) . "</p>";
    }
}
?>

<div class="page-header-flex">
    <div>
        <div class="hero-badge" style="margin-bottom: 8px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -1px;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <span>Pendaftaran Baru</span>
        </div>
        <h2 style="color: #0f172a; margin: 0; font-size: 1.45rem; font-weight: 700; letter-spacing: -0.02em;">Tambah Data Mahasiswa Baru</h2>
        <p style="margin: 4px 0 0 0; color: #64748b; font-size: 0.88rem;">Masukkan informasi biodata lengkap mahasiswa ke dalam sistem basis data.</p>
    </div>
</div>

<form action="" method="POST" style="max-width: 600px;">
    <div style="margin-bottom: 16px;">
        <label style="display: block; font-weight: 600; font-size: 0.88rem; color: #334155; margin-bottom: 6px;">NIM:</label>
        <input type="text" name="nim" required style="width: 100%; box-sizing: border-box;">
    </div>
    <div style="margin-bottom: 16px;">
        <label style="display: block; font-weight: 600; font-size: 0.88rem; color: #334155; margin-bottom: 6px;">Nama Lengkap:</label>
        <input type="text" name="nama" required style="width: 100%; box-sizing: border-box;">
    </div>

    <div style="margin-bottom: 16px;">
        <label style="display: block; font-weight: 600; font-size: 0.88rem; color: #334155; margin-bottom: 6px;">Program Studi:</label>
        <!-- Dropdown pilihan prodi -->
        <select name="prodi_id" required style="width: 100%; box-sizing: border-box;">
            <option value="">-- Pilih Program Studi --</option>
            <?php while ($p = mysqli_fetch_assoc($resultProdi)): ?>
                <option value="<?php echo $p['id']; ?>">
                    <?php echo htmlspecialchars($p['nama_prodi']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div style="margin-bottom: 22px;">
        <label style="display: block; font-weight: 600; font-size: 0.88rem; color: #334155; margin-bottom: 6px;">IPK:</label>
        <input type="number" step="0.01" max="4.00" min="0.00" name="ipk" required style="width: 100%; box-sizing: border-box;">
    </div>
    <div style="display: flex; align-items: center; gap: 12px;">
        <button type="submit" name="submit" class="btn-primary-action" style="border: none; cursor: pointer; padding: 10px 20px;">Simpan Data</button>
        <a href="index.php?modul=mahasiswa" style="color: #64748b; font-size: 0.88rem; font-weight: 600; text-decoration: none; padding: 9px 16px; border: 1px solid #cbd5e1; border-radius: var(--radius-sm);">Batal</a>
    </div>
</form>