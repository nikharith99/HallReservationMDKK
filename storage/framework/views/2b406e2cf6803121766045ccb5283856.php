<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Tempahan Dewan MDKK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --mdkk-green: #004225;
            --mdkk-gold: #d4af37;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--mdkk-green) 0%, #002a18 100%);
            color: white;
            padding: 4rem 0;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--mdkk-green) 0%, #002a18 100%);
            border: none;
            border-radius: 2rem;
            padding: 0.75rem 2rem;
        }

        .calendar-day {
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dee2e6;
            cursor: pointer;
            transition: all 0.2s;
        }

        .calendar-day:hover {
            background-color: #f8f9fa;
        }

        .calendar-day.booked {
            background-color: #ffebee;
            color: #d32f2f;
            font-weight: bold;
        }

        .calendar-day.available {
            background-color: #e8f5e8;
            color: #2e7d32;
        }

        .calendar-day.today {
            border: 2px solid var(--mdkk-green);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background-color: #d1edff;
            color: #0c5460;
        }

        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .reservation-card {
            transition: transform 0.2s;
            border-left: 4px solid var(--mdkk-green);
        }

        .reservation-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-success rounded mb-4">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-building me-2"></i>MDKK Hall Reservation
                </a>
                <div class="navbar-nav ms-auto">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->isAdmin()): ?>
                            <a class="nav-link" href="<?php echo e(route('admin.bookings.index')); ?>">
                                <i class="fas fa-cog me-1"></i>Admin Panel
                            </a>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="nav-link btn btn-link text-white">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    <?php else: ?>
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">
                            <i class="fas fa-lock me-1"></i>Admin Login
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="hero-section text-center">
            <div class="container">
                <div class="mb-4">
                    <img src="<?php echo e(asset('images/mdkk_logo.jpg')); ?>" alt="MDKK Logo" class="img-fluid" style="max-height: 180px; width: auto;">
                </div>

                <h1 class="display-4 fw-bold mb-3">
                    Sistem Tempahan Dewan MDKK
                </h1>
                <p class="lead mb-4">Sistem tempahan dewan dalam talian yang mudah dan pantas</p>

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show mx-auto" style="max-width: 500px;">
                        <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Action Cards -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-center h-100 border-0 shadow-sm">
                    <div class="card-body py-5">
                        <div class="text-success mb-3">
                            <i class="fas fa-plus-circle fa-4x"></i>
                        </div>
                        <h4 class="card-title">Buat Tempahan Baru</h4>
                        <p class="card-text">Tempah dewan untuk program dan aktiviti anda dengan mudah</p>
                        <a href="<?php echo e(route('bookings.create')); ?>" class="btn btn-success btn-lg mt-3">
                            <i class="fas fa-plus me-2"></i>Tempah Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-center h-100 border-0 shadow-sm">
                    <div class="card-body py-5">
                        <div class="text-primary mb-3">
                            <i class="fas fa-info-circle fa-4x"></i>
                        </div>
                        <h4 class="card-title">Maklumat Dewan</h4>
                        <p class="card-text">Lihat maklumat lengkap tentang dewan-dewan yang tersedia</p>
                        <button class="btn btn-outline-primary btn-lg mt-3" disabled>
                            <i class="fas fa-eye me-2"></i>Lihat Dewan
                        </button>
                    </div>
                </div>
            </div>

            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->isAdmin()): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body py-5">
                            <div class="text-warning mb-3">
                                <i class="fas fa-cog fa-4x"></i>
                            </div>
                            <h4 class="card-title">Panel Admin</h4>
                            <p class="card-text">Urus dan kelulusan tempahan dewan</p>
                            <a href="<?php echo e(route('admin.bookings.index')); ?>" class="btn btn-warning btn-lg mt-3 text-white">
                                <i class="fas fa-tasks me-2"></i>Urus Tempahan
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Calendar Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-calendar-alt me-2"></i>Kalendar Tempahan Dewan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6>Keterangan Warna:</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge available">Tersedia</span>
                                    <span class="badge booked">Telah Ditempah</span>
                                    <span class="badge bg-success">Hari Ini</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="btn-group">
                                    <button class="btn btn-outline-success" id="prevMonth">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="btn btn-outline-success" id="currentMonth">
                                        Bulan Semasa
                                    </button>
                                    <button class="btn btn-outline-success" id="nextMonth">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="calendar" class="table-responsive">
                            <!-- Calendar will be generated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reservations Section -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-list-alt me-2"></i>Tempahan Terkini
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Rujukan</th>
                                        <th>Nama Pemohon</th>
                                        <th>Dewan</th>
                                        <th>Tarikh</th>
                                        <th>Masa</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody id="recentBookings">
                                    <!-- Recent bookings will be populated by JavaScript -->
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">
                                            <i class="fas fa-spinner fa-spin me-2"></i>Memuatkan data...
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center mt-5 pt-4 border-top">
            <p class="text-muted">&copy; 2025 MDKK Hall Reservation System. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sample data - Replace with actual data from your backend
        const sampleBookings = [
            {
                id: 'BK001',
                applicant: 'Ahmad bin Ismail',
                hall: 'Dewan Serbaguna',
                date: '2024-01-15',
                startTime: '09:00',
                endTime: '12:00',
                status: 'approved'
            },
            {
                id: 'BK002',
                applicant: 'Siti Nurhaliza',
                hall: 'Dewan Konvensyen',
                date: '2024-01-16',
                startTime: '14:00',
                endTime: '17:00',
                status: 'pending'
            },
            {
                id: 'BK003',
                applicant: 'Mohd Razif',
                hall: 'Dewan Serbaguna',
                date: '2024-01-18',
                startTime: '10:00',
                endTime: '13:00',
                status: 'completed'
            },
            {
                id: 'BK004',
                applicant: 'Nor Aishah',
                hall: 'Dewan Konvensyen',
                date: '2024-01-20',
                startTime: '08:00',
                endTime: '11:00',
                status: 'rejected'
            }
        ];

        const bookedDates = ['2024-01-15', '2024-01-16', '2024-01-18', '2024-01-20', '2024-01-22', '2024-01-25'];

        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();

        function generateCalendar(month, year) {
            const calendarEl = document.getElementById('calendar');
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const startingDay = firstDay.getDay();
            const monthLength = lastDay.getDate();

            const monthNames = ["Januari", "Februari", "Mac", "April", "Mei", "Jun",
                               "Julai", "Ogos", "September", "Oktober", "November", "Disember"];

            document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;

            let html = `
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th style="width: 14.28%">Ahad</th>
                            <th style="width: 14.28%">Isnin</th>
                            <th style="width: 14.28%">Selasa</th>
                            <th style="width: 14.28%">Rabu</th>
                            <th style="width: 14.28%">Khamis</th>
                            <th style="width: 14.28%">Jumaat</th>
                            <th style="width: 14.28%">Sabtu</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            let date = 1;
            for (let i = 0; i < 6; i++) {
                html += '<tr>';
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < startingDay) {
                        html += '<td class="calendar-day"></td>';
                    } else if (date > monthLength) {
                        html += '<td class="calendar-day"></td>';
                    } else {
                        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
                        const isToday = currentDate.toDateString() === new Date(year, month, date).toDateString();
                        const isBooked = bookedDates.includes(dateStr);
                        const dayClass = isBooked ? 'booked' : 'available';
                        const todayClass = isToday ? 'today' : '';

                        html += `
                            <td class="calendar-day ${dayClass} ${todayClass}"
                                data-date="${dateStr}"
                                title="${isBooked ? 'Telah Ditempah' : 'Tersedia'}">
                                ${date}
                            </td>
                        `;
                        date++;
                    }
                }
                html += '</tr>';
                if (date > monthLength) break;
            }

            html += '</tbody></table>';
            calendarEl.innerHTML = html;
        }

        function populateRecentBookings() {
            const tbody = document.getElementById('recentBookings');

            if (sampleBookings.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            <i class="fas fa-info-circle me-2"></i>Tiada tempahan buat masa ini
                        </td>
                    </tr>
                `;
                return;
            }

            tbody.innerHTML = sampleBookings.map(booking => {
                const statusText = {
                    'pending': 'Dalam Proses',
                    'approved': 'Diluluskan',
                    'completed': 'Selesai',
                    'rejected': 'Ditolak'
                }[booking.status];

                const statusClass = {
                    'pending': 'status-pending',
                    'approved': 'status-approved',
                    'completed': 'status-completed',
                    'rejected': 'status-rejected'
                }[booking.status];

                return `
                    <tr class="reservation-card">
                        <td><strong>${booking.id}</strong></td>
                        <td>${booking.applicant}</td>
                        <td>${booking.hall}</td>
                        <td>${new Date(booking.date).toLocaleDateString('ms-MY')}</td>
                        <td>${booking.startTime} - ${booking.endTime}</td>
                        <td>
                            <span class="status-badge ${statusClass}">
                                ${statusText}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"
                                    onclick="viewBooking('${booking.id}')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        function viewBooking(bookingId) {
            // Find the booking in your data
            const booking = sampleBookings.find(b => b.id === bookingId);

            if (!booking) {
                alert('Tempahan tidak ditemui');
                return;
            }

            // Create and show modal
            const modalHtml = `
                <div class="modal fade" id="bookingModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Butiran Tempahan - ${booking.id}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <strong>Nama Pemohon:</strong><br>
                                        ${booking.applicant}
                                    </div>
                                    <div class="col-6">
                                        <strong>Dewan:</strong><br>
                                        ${booking.hall}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <strong>Tarikh:</strong><br>
                                        ${new Date(booking.date).toLocaleDateString('ms-MY')}
                                    </div>
                                    <div class="col-6">
                                        <strong>Masa:</strong><br>
                                        ${booking.startTime} - ${booking.endTime}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <strong>Status:</strong><br>
                                        <span class="badge ${getStatusBadgeClass(booking.status)}">
                                            ${getStatusText(booking.status)}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                ${booking.status === 'pending' ? `
                                    <button type="button" class="btn btn-success" onclick="approveBooking('${booking.id}')">
                                        Luluskan
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="rejectBooking('${booking.id}')">
                                        Tolak
                                    </button>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Remove existing modal if any
            const existingModal = document.getElementById('bookingModal');
            if (existingModal) {
                existingModal.remove();
            }

            // Add modal to body and show it
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
            modal.show();
        }

        // Helper functions
        function getStatusText(status) {
            const statusMap = {
                'pending': 'Dalam Proses',
                'approved': 'Diluluskan',
                'completed': 'Selesai',
                'rejected': 'Ditolak'
            };
            return statusMap[status] || status;
        }

        function getStatusBadgeClass(status) {
            const classMap = {
                'pending': 'bg-warning',
                'approved': 'bg-success',
                'completed': 'bg-info',
                'rejected': 'bg-danger'
            };
            return classMap[status] || 'bg-secondary';
        }

        // Event Listeners
        document.getElementById('prevMonth').addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentMonth, currentYear);
        });

        document.getElementById('nextMonth').addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });

        document.getElementById('currentMonth').addEventListener('click', () => {
            currentDate = new Date();
            currentMonth = currentDate.getMonth();
            currentYear = currentDate.getFullYear();
            generateCalendar(currentMonth, currentYear);
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            generateCalendar(currentMonth, currentYear);
            populateRecentBookings();
        });
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\HallReservationMDKK\resources\views/dashboard.blade.php ENDPATH**/ ?>