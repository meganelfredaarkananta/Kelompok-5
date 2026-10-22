<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RentWheels - Sistem Booking Kendaraan')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #dbeafe;
            --secondary: #64748b;
            --success: #059669;
            --warning: #d97706;
            --danger: #dc2626;
            --surface: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;
            --sidebar-width: 250px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--surface);
            color: var(--text-primary);
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar-main {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 60%, #3b82f6 100%);
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3);
            padding: 0;
        }

        .navbar-brand-custom {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ffffff !important;
            font-weight: 700;
            font-size: 1.25rem;
            text-decoration: none;
            padding: 14px 20px;
        }

        .navbar-brand-custom .brand-icon {
            width: 38px;
            height: 38px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .navbar-brand-custom .brand-sub {
            font-size: 0.7rem;
            font-weight: 400;
            opacity: 0.8;
            display: block;
            line-height: 1;
        }

        .navbar-nav-custom {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 0 16px;
        }

        .nav-item-custom a {
            display: flex;
            align-items: center;
            gap: 7px;
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-item-custom a:hover,
        .nav-item-custom a.active {
            background: rgba(255,255,255,0.15);
            color: #ffffff;
        }

        /* ── HERO BANNER ── */
        .page-hero {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 60%, #3b82f6 100%);
            padding: 36px 0 56px;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 280px; height: 280px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }

        .page-hero::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -40px;
            width: 220px; height: 220px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
        }

        .page-hero .hero-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 6px;
        }

        .page-hero .hero-sub {
            color: rgba(255,255,255,0.75);
            font-size: 0.9rem;
        }

        /* ── MAIN CONTENT ── */
        .main-content {
            margin-top: -32px;
            padding-bottom: 48px;
        }

        /* ── STAT CARDS ── */
        .stat-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.04);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.25s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.12);
        }

        .stat-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .stat-icon.blue   { background: #dbeafe; color: #2563eb; }
        .stat-icon.green  { background: #d1fae5; color: #059669; }
        .stat-icon.yellow { background: #fef3c7; color: #d97706; }
        .stat-icon.red    { background: #fee2e2; color: #dc2626; }

        .stat-label {
            font-size: 0.78rem;
            color: var(--text-secondary);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .stat-value {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        /* ── TABLE CARD ── */
        .table-card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.04);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .table-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .table-card-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ── CUSTOM TABLE ── */
        .table-custom {
            width: 100%;
            border-collapse: collapse;
        }

        .table-custom thead th {
            background: #f1f5f9;
            color: var(--text-secondary);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .table-custom tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.15s;
        }

        .table-custom tbody tr:last-child { border-bottom: none; }

        .table-custom tbody tr:hover { background: #f8fafc; }

        .table-custom tbody td {
            padding: 14px 16px;
            font-size: 0.875rem;
            color: var(--text-primary);
            vertical-align: middle;
        }

        /* ── BADGES ── */
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-status.menunggu  { background: #fef3c7; color: #92400e; }
        .badge-status.disetujui { background: #d1fae5; color: #065f46; }
        .badge-status.selesai   { background: #dbeafe; color: #1e40af; }
        .badge-status.batal     { background: #fee2e2; color: #991b1b; }

        .badge-jenis {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-jenis.mobil { background: #ede9fe; color: #5b21b6; }
        .badge-jenis.motor { background: #fce7f3; color: #9d174d; }

        /* ── BUTTONS ── */
        .btn-primary-custom {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.35);
            cursor: pointer;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px; height: 32px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-action.edit   { background: #fef3c7; color: #d97706; }
        .btn-action.delete { background: #fee2e2; color: #dc2626; }

        .btn-action.edit:hover   { background: #fde68a; color: #b45309; transform: scale(1.1); }
        .btn-action.delete:hover { background: #fca5a5; color: #b91c1c; transform: scale(1.1); }

        /* ── FORM CARD ── */
        .form-card {
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .form-card-header {
            padding: 24px 28px;
            border-bottom: 1px solid var(--border);
        }

        .form-card-header h4 {
            font-size: 1.15rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-card-header .header-icon {
            width: 38px; height: 38px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
        }

        .form-card-body { padding: 28px; }

        /* ── FORM CONTROLS ── */
        .form-label-custom {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 6px;
        }

        .form-control-custom,
        .form-select-custom {
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.9rem;
            color: var(--text-primary);
            background: #fff;
            transition: all 0.2s ease;
            width: 100%;
        }

        .form-control-custom:focus,
        .form-select-custom:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        textarea.form-control-custom { resize: vertical; }

        /* ── ALERT ── */
        .alert-custom {
            border-radius: 12px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .alert-success-custom {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
        }

        .empty-state i { font-size: 3.5rem; margin-bottom: 16px; display: block; }

        /* ── FOOTER ── */
        .footer-custom {
            background: #0f172a;
            color: rgba(255,255,255,0.5);
            text-align: center;
            padding: 18px;
            font-size: 0.8rem;
            margin-top: auto;
        }

        /* ── AVATAR INITIALS ── */
        .avatar-initials {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 576px) {
            .page-hero { padding: 28px 0 48px; }
            .page-hero .hero-title { font-size: 1.4rem; }
            .table-responsive { overflow-x: auto; }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar-main">
        <div class="container-lg d-flex align-items-center justify-content-between">
            <a href="{{ route('bookings.index') }}" class="navbar-brand-custom">
                <div class="brand-icon">
                    <i class="bi bi-car-front-fill"></i>
                </div>
                <div>
                    RentWheels
                    <span class="brand-sub">Sistem Booking Kendaraan</span>
                </div>
            </a>

            <div class="navbar-nav-custom d-none d-md-flex">
                <div class="nav-item-custom">
                    <a href="{{ route('bookings.index') }}" class="{{ request()->routeIs('bookings.index') ? 'active' : '' }}">
                        <i class="bi bi-grid-fill"></i> Dashboard
                    </a>
                </div>
                <div class="nav-item-custom">
                    <a href="{{ route('bookings.create') }}" class="{{ request()->routeIs('bookings.create') ? 'active' : '' }}">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Booking
                    </a>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 pe-3">
                <div class="avatar-initials d-none d-sm-flex">A</div>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer-custom mt-auto">
        &copy; {{ date('Y') }} RentWheels &mdash; Kelompok 5 &bull; Sistem Informasi Sewa Kendaraan
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
