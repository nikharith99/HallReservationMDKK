<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urus Tempahan - Admin MDKK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --mdkk-green: #004225;
            --mdkk-gold: #d4af37;
        }

        .admin-card {
            border: none;
            border-radius: 1rem;
            transition: transform 0.2s;
        }

        .admin-card:hover {
            transform: translateY(-2px);
        }

        .status-pending { border-left: 4px solid #ffc107; }
        .status-approved { border-left: 4px solid #198754; }
        .status-rejected { border-left: 4px solid #dc3545; }
        .status-completed { border-left: 4px solid #0dcaf0; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center text-white mb-4">
                        <h5><i class="fas fa-user-shield"></i> Admin MDKK</h5>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="{{ route('admin.bookings.index') }}">
                                <i class="fas fa-calendar-check me-2"></i>Urus Tempahan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('dashboard') }}">
                                <i class="fas fa-user me-2"></i>Halaman Pengguna
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link text-white btn btn-link text-decoration-none">
                                    <i class="fas fa-sign-out-alt me-2"></i>Log Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><i class="fas fa-calendar-check me-2"></i>Urus Tempahan Dewan</h1>
                </div>

                <!-- Stats Cards -->
                @if(isset($stats))
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card admin-card status-pending h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-warning">
                                            Jumlah Tempahan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total'] ?? 0 }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card admin-card status-pending h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Menunggu Kelulusan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['pending'] ?? 0 }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clock fa-2x text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card admin-card status-approved h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Telah Diluluskan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['confirmed'] ?? 0 }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-check fa-2x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card admin-card status-rejected h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Ditolak</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['cancelled'] ?? 0 }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-times fa-2x text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Bookings Table -->
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-list me-2"></i>Senarai Tempahan</h5>
                    </div>
                    <div class="card-body">
                        @if($bookings->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Penganjur</th>
                                            <th>Dewan</th>
                                            <th>Tarikh/Masa Mula</th>
                                            <th>Tarikh/Masa Tamat</th>
                                            <th>Tujuan</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->id }}</td>
                                                <td>
                                                    <strong>{{ $booking->organizer_name }}</strong><br>
                                                    <small class="text-muted">{{ $booking->organization }}</small>
                                                </td>
                                                <td>{{ $booking->hall->name ?? 'N/A' }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($booking->start_at)->format('d/m/Y') }}<br>
                                                    <small class="text-muted">{{ \Carbon\Carbon::parse($booking->start_at)->format('H:i') }}</small>
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($booking->end_at)->format('d/m/Y') }}<br>
                                                    <small class="text-muted">{{ \Carbon\Carbon::parse($booking->end_at)->format('H:i') }}</small>
                                                </td>
                                                <td>{{ $booking->purpose ?? 'N/A' }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'pending' ? 'warning' : 'danger') }}">
                                                        {{ $booking->status == 'confirmed' ? 'Lulus' : ($booking->status == 'pending' ? 'Menunggu' : 'Ditolak') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-primary" title="Lihat">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-success" title="Lulus">
                                                            <i class="fas fa-check"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-danger" title="Tolak">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle me-2"></i>Tiada tempahan ditemui.
                            </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
