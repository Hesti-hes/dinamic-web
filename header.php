<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Dinamis & Autentikasi Session - Portal Akademik</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #f8fafc;
            --bg-surface: #ffffff;
            --header-bg: #0f172a;
            --header-surface: #1e293b;
            --nav-bg: #1e293b;
            --nav-border: #334155;
            --primary: #0284c7;
            --primary-hover: #0369a1;
            --primary-light: #e0f2fe;
            --accent: #0f766e;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --text-light: #94a3b8;
            --border-color: #e2e8f0;
            --success: #10b981;
            --success-light: #d1fae5;
            --warning: #f59e0b;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 10px 25px -3px rgba(15, 23, 42, 0.08), 0 4px 6px -4px rgba(15, 23, 42, 0.04);
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 16px;
            --transition: all 0.2s ease-in-out;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            margin: 0;
            padding: 0;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        /* Header Styling */
        header.main-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #ffffff;
            padding: 20px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .header-container {
            max-width: 1060px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .header-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            border-left: 3.5px solid var(--primary);
            padding-left: 14px;
        }

        .brand-title {
            margin: 0;
            font-size: 1.45rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #ffffff;
            line-height: 1.25;
        }

        .brand-subtitle {
            margin: 4px 0 0 0;
            font-size: 0.82rem;
            color: var(--text-light);
            font-weight: 400;
            letter-spacing: 0.01em;
        }

        .user-status-card {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 8px 14px;
            border-radius: var(--radius-md);
            font-size: 0.85rem;
        }

        .user-avatar-badge {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #0284c7, #0f766e);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .user-info-text {
            display: flex;
            flex-direction: column;
            line-height: 1.3;
        }

        .user-name {
            color: #ffffff;
            font-weight: 600;
        }

        .user-meta {
            color: var(--text-light);
            font-size: 0.75rem;
        }

        .status-dot-active {
            display: inline-block;
            width: 7px;
            height: 7px;
            background-color: #22c55e;
            border-radius: 50%;
            margin-right: 4px;
            box-shadow: 0 0 8px #22c55e;
        }

        /* Navigation Bar */
        nav.main-nav {
            background: var(--nav-bg);
            border-bottom: 1px solid var(--nav-border);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }

        .nav-container {
            max-width: 1060px;
            margin: 0 auto;
            padding: 6px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 500;
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .nav-links a:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
        }

        .nav-links a.active {
            color: #ffffff;
            background: var(--primary);
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(2, 132, 199, 0.35);
        }

        .nav-links a.nav-admin {
            color: #2dd4bf;
        }

        .nav-links a.nav-admin:hover {
            background: rgba(45, 212, 191, 0.12);
            color: #5eead4;
        }

        .nav-links a.nav-admin.active {
            background: #0f766e;
            color: #ffffff;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-nav-login {
            background: #f59e0b;
            color: #0f172a !important;
            font-size: 0.84rem;
            font-weight: 600 !important;
            padding: 7px 14px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-nav-login:hover {
            background: #d97706;
            color: #ffffff !important;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
        }

        .btn-nav-logout {
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5 !important;
            border: 1px solid rgba(239, 68, 68, 0.3);
            font-size: 0.84rem;
            font-weight: 600 !important;
            padding: 6px 14px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-nav-logout:hover {
            background: #ef4444;
            color: #ffffff !important;
            border-color: #ef4444;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
        }

        /* Container Layout */
        .container {
            max-width: 1060px;
            margin: 28px auto;
            background: var(--bg-surface);
            padding: 32px 36px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            min-height: 420px;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 24px 16px;
            background: #0f172a;
            color: #94a3b8;
            margin-top: 48px;
            font-size: 0.84rem;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        footer p {
            margin: 0;
        }

        /* Global Elements: Table, Forms, Buttons */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            border-radius: var(--radius-md);
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        th,
        td {
            padding: 12px 16px;
            text-align: left;
            font-size: 0.9rem;
        }

        th {
            background-color: #1e293b;
            color: #f8fafc;
            font-weight: 600;
            border-bottom: 1px solid var(--border-color);
        }

        td {
            border-bottom: 1px solid var(--border-color);
            background-color: #ffffff;
            color: #334155;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        select,
        textarea {
            font-family: inherit;
            border: 1px solid #cbd5e1;
            border-radius: var(--radius-sm);
            padding: 9px 12px;
            font-size: 0.9rem;
            outline: none;
            transition: var(--transition);
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
        }

        /* Modern Beranda / Dashboard Components */
        .beranda-hero {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border: 1px solid #cbd5e1;
            border-radius: var(--radius-md);
            padding: 28px 32px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #e0f2fe;
            color: #0369a1;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            margin-bottom: 12px;
            letter-spacing: 0.02em;
        }

        .beranda-hero h2 {
            margin: 0 0 10px 0;
            color: #0f172a;
            font-size: 1.65rem;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .beranda-hero p {
            margin: 0 0 18px 0;
            color: #475569;
            font-size: 0.96rem;
            max-width: 720px;
            line-height: 1.6;
        }

        .hero-meta-bar {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            padding-top: 14px;
            border-top: 1px solid #cbd5e1;
            font-size: 0.83rem;
            color: #64748b;
        }

        .hero-meta-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .hero-meta-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background-color: var(--primary);
        }

        .hero-meta-dot.green {
            background-color: #10b981;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 16px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            min-width: 0;
        }

        .stat-card:hover {
            border-color: #cbd5e1;
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .stat-blue {
            background: #e0f2fe;
            color: #0284c7;
        }

        .stat-green {
            background: #dcfce7;
            color: #16a34a;
        }

        .stat-amber {
            background: #fef3c7;
            color: #d97706;
        }

        .stat-purple {
            background: #f3e8ff;
            color: #9333ea;
        }

        .stat-content {
            display: flex;
            flex-direction: column;
            min-width: 0;
            flex: 1;
        }

        .stat-label {
            font-size: 0.78rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-weight: 600;
        }

        .stat-value {
            font-size: 1.05rem;
            color: #0f172a;
            font-weight: 700;
            margin-top: 2px;
            word-break: break-word;
            overflow-wrap: anywhere;
        }

        /* Contact Cards Grid */
        .contact-cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .contact-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 20px 22px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            min-width: 0;
        }

        .contact-card:hover {
            border-color: #cbd5e1;
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .contact-card-icon {
            width: 46px;
            height: 46px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .contact-card-content {
            display: flex;
            flex-direction: column;
            min-width: 0;
            flex: 1;
        }

        .contact-card-label {
            font-size: 0.78rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-weight: 600;
        }

        .contact-card-value {
            font-size: 0.95rem;
            color: #0f172a;
            font-weight: 600;
            margin-top: 4px;
            line-height: 1.45;
            word-break: break-all;
            overflow-wrap: anywhere;
        }

        /* Panel Deskripsi & Panduan Beranda */
        .beranda-panels-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .beranda-panel {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 22px 24px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .beranda-panel:hover {
            border-color: #cbd5e1;
            box-shadow: var(--shadow-md);
        }

        .beranda-panel-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .beranda-panel-icon {
            font-size: 1.25rem;
        }

        .beranda-panel-title {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
            color: #0f172a;
        }

        .beranda-panel p {
            margin: 0;
            font-size: 0.89rem;
            color: #475569;
            line-height: 1.6;
        }

        .beranda-panel ul {
            margin: 10px 0 0 0;
            padding-left: 18px;
            font-size: 0.87rem;
            color: #475569;
            line-height: 1.6;
        }

        .beranda-panel li {
            margin-bottom: 4px;
        }

        /* Prodi Tags */
        .prodi-tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }

        .prodi-tag {
            background: #f1f5f9;
            color: #334155;
            border: 1px solid #cbd5e1;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 5px 11px;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .prodi-tag:hover {
            background: #e0f2fe;
            color: var(--primary);
            border-color: #93c5fd;
        }

        /* Page Header with Action Button */
        .page-header-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 22px;
            padding-bottom: 18px;
            border-bottom: 1px solid var(--border-color);
        }

        .btn-primary-action {
            background: #0f766e;
            color: #ffffff !important;
            padding: 9px 16px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
            box-shadow: 0 2px 4px rgba(15, 118, 110, 0.2);
        }

        .btn-primary-action:hover {
            background: #115e59;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(15, 118, 110, 0.3);
        }

        /* Action Buttons in Tables */
        .btn-action {
            display: inline-block;
            padding: 5px 12px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .btn-action-edit {
            background: #e0f2fe;
            color: #0369a1 !important;
            border: 1px solid #bae6fd;
            margin-right: 6px;
        }

        .btn-action-edit:hover {
            background: #0284c7;
            color: #ffffff !important;
            border-color: #0284c7;
        }

        .btn-action-delete {
            background: #fee2e2;
            color: #b91c1c !important;
            border: 1px solid #fecaca;
        }

        .btn-action-delete:hover {
            background: #ef4444;
            color: #ffffff !important;
            border-color: #ef4444;
        }

        .badge-ipk {
            display: inline-block;
            background: #ecfdf5;
            color: #047857;
            font-weight: 700;
            font-size: 0.84rem;
            padding: 3px 8px;
            border-radius: var(--radius-sm);
            border: 1px solid #a7f3d0;
        }

        .table-meta-footer {
            margin-top: 16px;
            font-size: 0.84rem;
            color: var(--text-muted);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        /* System Info Callout Box */
        .system-info-callout {
            background: #f8fafc;
            border-left: 4px solid var(--primary);
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
            padding: 16px 20px;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-top: 10px;
        }

        .system-info-callout p {
            margin: 0;
            font-size: 0.88rem;
            color: #475569;
            line-height: 1.5;
        }

        /* Responsive Breakpoints */
        @media (max-width: 768px) {
            header.main-header {
                padding: 16px;
            }

            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .brand-title {
                font-size: 1.25rem;
            }

            .container {
                margin: 16px;
                padding: 22px 20px;
            }

            .nav-container {
                padding: 8px 12px;
            }

            .stats-grid,
            .contact-cards-grid,
            .beranda-panels-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <header class="main-header">
        <div class="header-container">
            <div class="header-brand">
                <div class="brand-text">
                    <h1 class="brand-title">Portal Akademik Kampus Nusantara</h1>
                    <p class="brand-subtitle">Sistem Informasi Pengelolaan Data & Autentikasi Terpadu</p>
                </div>
            </div>

            <!-- Menampilkan informasi user jika session login masih aktif -->
            <?php if (isset($_SESSION['login_status']) && $_SESSION['login_status'] === true): ?>
                <div class="user-status-card">
                    <div class="user-avatar-badge">
                        <?php echo strtoupper(substr($_SESSION['nama_lengkap'] ?? 'U', 0, 1)); ?>
                    </div>
                    <div class="user-info-text">
                        <span class="user-name"><?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?></span>
                        <span class="user-meta">
                            <em>@<?php echo htmlspecialchars($_SESSION['username']); ?></em> • 
                            <span style="color: #4ade80; font-weight: 600;"><span class="status-dot-active"></span>Aktif</span>
                        </span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <?php $activeModul = $_GET['modul'] ?? 'beranda'; ?>
    <nav class="main-nav">
        <div class="nav-container">
            <div class="nav-links">
                <a href="index.php?modul=beranda" class="<?php echo $activeModul === 'beranda' ? 'active' : ''; ?>">
                    <span>Beranda</span>
                </a>
                <a href="index.php?modul=profil" class="<?php echo $activeModul === 'profil' ? 'active' : ''; ?>">
                    <span>Profil Kampus</span>
                </a>
                <a href="index.php?modul=mahasiswa" class="<?php echo in_array($activeModul, ['mahasiswa', 'mahasiswa_tambah', 'mahasiswa_edit']) ? 'active' : ''; ?>">
                    <span>Data Mahasiswa (CRUD)</span>
                </a>
                <a href="index.php?modul=kontak" class="<?php echo $activeModul === 'kontak' ? 'active' : ''; ?>">
                    <span>Kontak</span>
                </a>

                <!-- Tampilkan menu Kelola Admin hanya jika sesi login aktif -->
                <?php if (isset($_SESSION['login_status'])): ?>
                    <a href="index.php?modul=admin" class="nav-admin <?php echo in_array($activeModul, ['admin', 'admin_tambah', 'admin_edit']) ? 'active' : ''; ?>">
                        <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -2px; margin-right: 3px;"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>Kelola Admin</span>
                    </a>
                <?php endif; ?>
            </div>

            <div class="nav-actions">
                <!-- Pergantian Tombol Login/Logout -->
                <?php if (isset($_SESSION['login_status'])): ?>
                    <a href="index.php?modul=logout" class="btn-nav-logout" onclick="return confirm('Keluar dari sistem?');">
                        <span>Keluar (Logout)</span>
                    </a>
                <?php else: ?>
                    <a href="index.php?modul=login" class="btn-nav-login">
                        <span>Kredensial Admin</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container">