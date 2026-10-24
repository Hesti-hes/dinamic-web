<!-- Hero Section -->
<div class="beranda-hero">
    <div class="hero-badge">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -1px;"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
        <span>Sistem Informasi Akademik Terpadu</span>
    </div>
    <h2>Selamat Datang di Portal Kampus Nusantara</h2>
    <p>
        Platform akademik berbasis web modular dinamis yang dirancang untuk mempermudah pemantauan informasi sivitas akademika, pengelolaan data mahasiswa secara terpusat, dan integrasi layanan kampus yang cepat serta efisien.
    </p>
    <div class="hero-meta-bar">
        <span class="hero-meta-item">
            <span class="hero-meta-dot green"></span>
            <strong>Status Sistem:</strong> Online & Aktif
        </span>
        <span class="hero-meta-item">
            <span class="hero-meta-dot"></span>
            <strong>Arsitektur:</strong> PHP Dynamic Routing
        </span>
        <span class="hero-meta-item">
            <span class="hero-meta-dot"></span>
            <strong>Hak Akses:</strong> <?php echo isset($_SESSION['login_status']) ? 'Administrator Terdaftar' : 'Pengunjung Umum'; ?>
        </span>
    </div>
</div>

<!-- Quick Stats Overview -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon stat-blue">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        </div>
        <div class="stat-content">
            <span class="stat-label">Sistem Akademik</span>
            <span class="stat-value">Aktif & Stabil</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon stat-green">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="22" x2="21" y2="22"></line><line x1="6" y1="18" x2="6" y2="11"></line><line x1="10" y1="18" x2="10" y2="11"></line><line x1="14" y1="18" x2="14" y2="11"></line><line x1="18" y1="18" x2="18" y2="11"></line><polygon points="12 2 20 7 4 7"></polygon></svg>
        </div>
        <div class="stat-content">
            <span class="stat-label">Akreditasi Kampus</span>
            <span class="stat-value">Predikat Unggul</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon stat-amber">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
        </div>
        <div class="stat-content">
            <span class="stat-label">Arsitektur Web</span>
            <span class="stat-value">PHP Native Dinamis</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon stat-purple">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        </div>
        <div class="stat-content">
            <span class="stat-label">Keamanan Sesi</span>
            <span class="stat-value"><?php echo isset($_SESSION['login_status']) ? 'Terautentikasi' : 'Siap Akses'; ?></span>
        </div>
    </div>
</div>

<!-- Panel Deskripsi & Petunjuk Penggunaan -->
<div class="beranda-panels-grid">
    <div class="beranda-panel">
        <div class="beranda-panel-header">
            <span class="beranda-panel-icon" style="color: var(--primary);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
            </span>
            <h3 class="beranda-panel-title">Tentang Portal Akademik</h3>
        </div>
        <p>
            Aplikasi ini dikembangkan untuk mengelola informasi akademik perguruan tinggi secara terintegrasi. Dilengkapi dengan pengelolaan basis data MySQLi, autentikasi berbasis session dan cookie, serta struktur kode prosedural yang rapi dan modular.
        </p>
    </div>

    <div class="beranda-panel">
        <div class="beranda-panel-header">
            <span class="beranda-panel-icon" style="color: var(--primary);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
            </span>
            <h3 class="beranda-panel-title">Petunjuk Navigasi Menu</h3>
        </div>
        <p>
            Seluruh layanan dan pengelolaan data dapat diakses langsung melalui menu navigasi di bagian atas:
        </p>
        <ul>
            <li><strong>Profil Kampus:</strong> Informasi visi, misi, dan identitas kampus.</li>
            <li><strong>Data Mahasiswa:</strong> Akses pengelolaan biodata dan prodi (CRUD).</li>
            <li><strong>Kontak:</strong> Layanan bantuan dan kanal informasi resmi.</li>
        </ul>
    </div>
</div>

<!-- Informasi Sistem / Footer Callout -->
<div class="system-info-callout">
    <div style="color: var(--primary); display: flex; align-items: center;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6"></path><path d="M10 22h4"></path><path d="M12 2a7 7 0 0 0-7 7c0 2.38 1.19 4.47 3 5.74V17a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2.26c1.81-1.27 3-3.36 3-5.74a7 7 0 0 0-7-7z"></path></svg>
    </div>
    <p>
        <strong>Navigasi Dinamis:</strong> Situs ini dibangun menggunakan arsitektur URL routing berbasis parameter <code>$_GET['modul']</code>. Seluruh modul konten dimuat secara modular tanpa melakukan refresh pada struktur tata letak (layout) utama.
    </p>
</div>