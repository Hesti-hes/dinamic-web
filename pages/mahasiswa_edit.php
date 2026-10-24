<?php
$id = $_GET['id'] ?? '';
if (empty($id)) {
    echo "<script>window.location='index.php?modul=mahasiswa';</script>";
    exit;
}

// Ambil data mahasiswa berdasarkan ID
$query = "SELECT * FROM biodata_mhs WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$mhs = mysqli_fetch_assoc($result);

if (!$mhs) {
    echo "<p style='color:red;'>Data mahasiswa tidak ditemukan.</p>";
    exit;
}

// Ambil daftar program studi untuk dropdown
$queryProdi = "SELECT * FROM prodi ORDER BY nama_prodi ASC";
$resultProdi = mysqli_query($conn, $queryProdi);

if (isset($_POST['update'])) {
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    // Menangkap prodi_id dari dropdown yang diubah
    $prodi_id = mysqli_real_escape_string($conn, $_POST['prodi_id']);
    $ipk = mysqli_real_escape_string($conn, $_POST['ipk']);

    // Ambil nama_prodi dari tabel prodi agar kolom prodi (varchar) di database ikut tersinkronisasi
    $qProdi = mysqli_query($conn, "SELECT nama_prodi FROM prodi WHERE id = '$prodi_id'");
    $dataProdi = mysqli_fetch_assoc($qProdi);
    $nama_prodi = $dataProdi['nama_prodi'] ?? '';

    // Update prodi_id dan prodi di database
    $updateQuery = "UPDATE biodata_mhs SET nim='$nim', nama='$nama', prodi_id='$prodi_id', prodi='$nama_prodi', ipk='$ipk' WHERE id='$id'";
    $update = mysqli_query($conn, $updateQuery);

    if ($update) {
        echo "<script>alert('Data mahasiswa berhasil diperbarui!'); window.location='index.php?modul=mahasiswa';</script>";
    } else {
        echo "<p style='color:red;'>Gagal memperbarui data: " . mysqli_error($conn) . "</p>";
    }
}
?>

<div class="page-header-flex">
    <div>
        <div class="hero-badge" style="margin-bottom: 8px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -1px;"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            <span>Formulir Perubahan</span>
        </div>
        <h2 style="color: #0f172a; margin: 0; font-size: 1.45rem; font-weight: 700; letter-spacing: -0.02em;">Ubah Data Mahasiswa</h2>
        <p style="margin: 4px 0 0 0; color: #64748b; font-size: 0.88rem;">Perbarui biodata dan pemetaan relasi program studi mahasiswa.</p>
    </div>
</div>

<form action="" method="POST" style="max-width: 600px;">
    <div style="margin-bottom: 16px;">
        <label style="display: block; font-weight: 600; font-size: 0.88rem; color: #334155; margin-bottom: 6px;">NIM:</label>
        <input type="text" name="nim" value="<?php echo htmlspecialchars($mhs['nim']); ?>" required style="width: 100%; box-sizing: border-box;">
    </div>
    <div style="margin-bottom: 16px;">
        <label style="display: block; font-weight: 600; font-size: 0.88rem; color: #334155; margin-bottom: 6px;">Nama Lengkap:</label>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($mhs['nama']); ?>" required style="width: 100%; box-sizing: border-box;">
    </div>

    <div style="margin-bottom: 16px;">
        <label style="display: block; font-weight: 600; font-size: 0.88rem; color: #334155; margin-bottom: 6px;">Program Studi:</label>
        <!-- Dropdown pilihan prodi dengan menyeleksi data lama -->
        <select name="prodi_id" required style="width: 100%; box-sizing: border-box;">
            <option value="">-- Pilih Program Studi --</option>
            <?php while ($p = mysqli_fetch_assoc($resultProdi)): ?>
                <option value="<?php echo $p['id']; ?>" <?php echo ($mhs['prodi_id'] == $p['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($p['nama_prodi']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div style="margin-bottom: 22px;">
        <label style="display: block; font-weight: 600; font-size: 0.88rem; color: #334155; margin-bottom: 6px;">IPK:</label>
        <input type="number" step="0.01" max="4.00" min="0.00" name="ipk" value="<?php echo $mhs['ipk']; ?>" required style="width: 100%; box-sizing: border-box;">
    </div>
    <div style="display: flex; align-items: center; gap: 12px;">
        <button type="submit" name="update" class="btn-primary-action" style="border: none; cursor: pointer; padding: 10px 20px;">Perbarui Data</button>
        <a href="index.php?modul=mahasiswa" style="color: #64748b; font-size: 0.88rem; font-weight: 600; text-decoration: none; padding: 9px 16px; border: 1px solid #cbd5e1; border-radius: var(--radius-sm);">Batal</a>
    </div>
</form>