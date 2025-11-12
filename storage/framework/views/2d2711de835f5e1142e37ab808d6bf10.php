<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Borang Tempahan Dewan - Majlis Daerah Kuala Krai</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        />
        <style>
            /* ===== MDKK Color Theme ===== */
            :root {
                --mdkk-green: #004225;
                --mdkk-gold: #d4af37;
                --mdkk-light-green: #e8f5e9;
                --mdkk-light-gold: #fef9e7;
            }

            body {
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                min-height: 100vh;
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            }

            .card-mdkk {
                border: none;
                border-radius: 1.5rem;
                box-shadow: 0 15px 30px rgba(0, 66, 37, 0.1);
                overflow: hidden;
                transition: transform 0.3s ease;
                background: white;
            }

            .card-mdkk:hover {
                transform: translateY(-5px);
            }

            .card-header-mdkk {
                background: linear-gradient(
                    135deg,
                    var(--mdkk-green) 0%,
                    #002a18 100%
                );
                color: white;
                padding: 1.5rem 2rem;
                position: relative;
                overflow: hidden;
            }

            .card-header-mdkk::before {
                content: "";
                position: absolute;
                top: 0;
                right: 0;
                width: 100px;
                height: 100px;
                background: rgba(212, 175, 55, 0.1);
                border-radius: 50%;
                transform: translate(30px, -30px);
            }

            .card-header-mdkk::after {
                content: "";
                position: absolute;
                bottom: -20px;
                left: -20px;
                width: 80px;
                height: 80px;
                background: rgba(212, 175, 55, 0.1);
                border-radius: 50%;
            }

            .form-label {
                font-weight: 600;
                color: var(--mdkk-green);
                margin-bottom: 0.5rem;
                display: flex;
                align-items: center;
            }

            .form-label i {
                margin-right: 8px;
                color: var(--mdkk-gold);
            }

            .form-control,
            .form-select {
                border-radius: 0.75rem;
                padding: 0.75rem 1rem;
                border: 2px solid #e9ecef;
                transition: all 0.3s ease;
                background-color: #f8f9fa;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: var(--mdkk-gold);
                box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
                background-color: white;
            }

            .input-group-text {
                background-color: var(--mdkk-green);
                color: white;
                border: none;
                border-radius: 0.75rem 0 0 0.75rem;
            }

            .btn-mdkk {
                background: linear-gradient(
                    135deg,
                    var(--mdkk-green) 0%,
                    #002a18 100%
                );
                color: white;
                border: none;
                border-radius: 2rem;
                padding: 0.75rem 2rem;
                font-weight: 600;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0, 66, 37, 0.2);
            }

            .btn-mdkk:hover {
                background: linear-gradient(
                    135deg,
                    var(--mdkk-gold) 0%,
                    #c19b2c 100%
                );
                color: var(--mdkk-green);
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            }

            .btn-mdkk:active {
                transform: translateY(0);
            }

            .alert-danger {
                border-left: 5px solid var(--mdkk-gold);
                border-radius: 0.75rem;
                background-color: var(--mdkk-light-gold);
            }

            .form-section {
                background-color: var(--mdkk-light-green);
                border-radius: 1rem;
                padding: 1.5rem;
                margin-bottom: 1.5rem;
                border-left: 4px solid var(--mdkk-gold);
            }

            .form-section-title {
                color: var(--mdkk-green);
                font-weight: 700;
                margin-bottom: 1rem;
                display: flex;
                align-items: center;
            }

            .form-section-title i {
                margin-right: 10px;
                color: var(--mdkk-gold);
            }

            .floating-label {
                position: relative;
                margin-bottom: 1.5rem;
            }

            .floating-label .form-control {
                padding-top: 1.5rem;
            }

            .floating-label label {
                position: absolute;
                top: 0.75rem;
                left: 1rem;
                color: #6c757d;
                transition: all 0.2s ease;
                pointer-events: none;
                background: white;
                padding: 0 0.25rem;
            }

            .floating-label .form-control:focus + label,
            .floating-label .form-control:not(:placeholder-shown) + label {
                top: -0.5rem;
                left: 0.75rem;
                font-size: 0.75rem;
                color: var(--mdkk-gold);
                font-weight: 600;
            }

            .logo-container {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
            }

            .logo {
                width: 60px;
                height: 60px;
                background: var(--mdkk-gold);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 15px;
                color: var(--mdkk-green);
                font-size: 1.5rem;
            }

            .required::after {
                content: " *";
                color: #dc3545;
            }

            /* Hall Option Styles */
            .hall-option {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.5rem 0;
            }

            .hall-info {
                flex-grow: 1;
            }

            .hall-name {
                font-weight: 600;
                color: var(--mdkk-green);
            }

            .hall-capacity {
                font-size: 0.9rem;
                color: #6c757d;
            }

            .hall-price {
                font-weight: 700;
                color: var(--mdkk-green);
                white-space: nowrap;
                margin-left: 1rem;
            }

            /* Equipment Section Styles */
            .equipment-item {
                display: flex;
                align-items: center;
                padding: 0.75rem;
                border-radius: 0.5rem;
                margin-bottom: 0.5rem;
                background-color: white;
                border: 1px solid #e9ecef;
                transition: all 0.2s ease;
            }

            .equipment-item:hover {
                background-color: #f8f9fa;
                border-color: var(--mdkk-gold);
            }

            .equipment-item.selected {
                background-color: var(--mdkk-light-gold);
                border-color: var(--mdkk-gold);
            }

            .equipment-checkbox {
                margin-right: 1rem;
            }

            .equipment-details {
                flex-grow: 1;
            }

            .equipment-price {
                font-weight: 600;
                color: var(--mdkk-green);
                margin-left: 1rem;
                white-space: nowrap;
            }

            /* Total Section Styles */
            .total-section {
                background-color: var(--mdkk-light-gold);
                border-radius: 1rem;
                padding: 1.5rem;
                margin-bottom: 1.5rem;
                border-left: 4px solid var(--mdkk-gold);
            }

            .total-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 0.75rem;
                padding-bottom: 0.75rem;
                border-bottom: 1px dashed #dee2e6;
            }

            .total-row:last-child {
                border-bottom: none;
                margin-bottom: 0;
                padding-bottom: 0;
            }

            .total-label {
                font-weight: 600;
                color: var(--mdkk-green);
            }

            .total-amount {
                font-weight: 700;
                color: var(--mdkk-green);
            }

            .grand-total {
                font-size: 1.5rem;
                font-weight: 800;
                color: var(--mdkk-green);
                margin-top: 0.5rem;
                padding-top: 0.75rem;
                border-top: 2px solid var(--mdkk-gold);
            }

            .price-breakdown {
                font-size: 0.85rem;
                color: #6c757d;
                margin-top: 0.25rem;
            }
        </style>
    </head>
    <body>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card card-mdkk">
                        <div class="card-header card-header-mdkk text-center">
                            <div class="logo-container">
                                <div>
                                    <h3 class="mb-1">
                                        Majlis Daerah Kuala Krai
                                    </h3>
                                    <p class="mb-0 opacity-75">
                                        Sistem Tempahan Dewan
                                    </p>
                                </div>
                            </div>
                            <h4 class="mb-0 mt-2">
                                <i class="fas fa-university me-2"></i>Borang
                                Tempahan Dewan
                            </h4>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <!-- Success/Error Messages -->
                            <div
                                class="alert alert-success alert-dismissible fade show mb-4 d-none"
                                role="alert"
                                id="successAlert"
                            >
                                <div class="d-flex align-items-center">
                                    <i
                                        class="fas fa-check-circle me-3 fa-lg"
                                    ></i>
                                    <div>
                                        <strong>Berjaya!</strong> Permohonan
                                        anda telah dihantar.
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                ></button>
                            </div>

                            <div
                                class="alert alert-danger alert-dismissible fade show mb-4 d-none"
                                role="alert"
                                id="errorAlert"
                            >
                                <div class="d-flex align-items-center">
                                    <i
                                        class="fas fa-exclamation-triangle me-3 fa-lg"
                                    ></i>
                                    <div>
                                        <strong>Ralat!</strong> Sila semak
                                        maklumat yang dimasukkan.
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                ></button>
                                <ul class="mt-2 mb-0" id="errorList">
                                    <!-- Error messages will be inserted here -->
                                </ul>
                            </div>

                            <form
                                method="POST"
                                action="#"
                                enctype="multipart/form-data"
                                id="bookingForm"
                            >
                                <!-- Dewan Section -->
                                <div class="form-section">
                                    <h5 class="form-section-title">
                                        <i class="fas fa-building"></i> Maklumat
                                        Dewan
                                    </h5>
                                    <div class="mb-3">
                                        <label
                                            for="hall_id"
                                            class="form-label required"
                                        >
                                            <i class="fas fa-list"></i> Nama
                                            Dewan
                                        </label>
                                        <select
                                            name="hall_id"
                                            id="hall_id"
                                            class="form-select"
                                            required
                                        >
                                            <option value="" data-price="0">
                                                -- Pilih Dewan --
                                            </option>
                                            <option value="1" data-price="500">
                                                <div class="hall-option">
                                                    <div class="hall-info">
                                                        <div class="hall-name">
                                                            Dewan Sri Guchil
                                                        </div>
                                                        <div
                                                            class="hall-capacity"
                                                        >
                                                            Kapasiti: 300 orang
                                                        </div>
                                                    </div>
                                                    <div class="hall-price">
                                                        RM500
                                                    </div>
                                                </div>
                                            </option>
                                            <option value="2" data-price="800">
                                                <div class="hall-option">
                                                    <div class="hall-info">
                                                        <div class="hall-name">
                                                            Dewan KSM Kuala Krai
                                                        </div>
                                                        <div
                                                            class="hall-capacity"
                                                        >
                                                            Kapasiti: 500 orang
                                                        </div>
                                                    </div>
                                                    <div class="hall-price">
                                                        RM800
                                                    </div>
                                                </div>
                                            </option>
                                            <option value="3" data-price="400">
                                                <div class="hall-option">
                                                    <div class="hall-info">
                                                        <div class="hall-name">
                                                            Dewan MPS
                                                        </div>
                                                        <div
                                                            class="hall-capacity"
                                                        >
                                                            Kapasiti: 200 orang
                                                        </div>
                                                    </div>
                                                    <div class="hall-price">
                                                        RM400
                                                    </div>
                                                </div>
                                            </option>
                                            <option value="4" data-price="300">
                                                <div class="hall-option">
                                                    <div class="hall-info">
                                                        <div class="hall-name">
                                                            Dewan Serbaguna
                                                        </div>
                                                        <div
                                                            class="hall-capacity"
                                                        >
                                                            Kapasiti: 150 orang
                                                        </div>
                                                    </div>
                                                    <div class="hall-price">
                                                        RM300
                                                    </div>
                                                </div>
                                            </option>
                                        </select>
                                        <div class="form-text mt-2">
                                            Harga yang dipaparkan adalah untuk
                                            tempahan satu hari (8 jam)
                                        </div>
                                    </div>
                                </div>

                                <!-- Penganjur Section -->
                                <div class="form-section">
                                    <h5 class="form-section-title">
                                        <i class="fas fa-user-tie"></i> Maklumat
                                        Penganjur
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label
                                                for="organizer_name"
                                                class="form-label required"
                                            >
                                                <i class="fas fa-user"></i> Nama
                                                Penganjur
                                            </label>
                                            <input
                                                type="text"
                                                id="organizer_name"
                                                name="organizer_name"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label
                                                for="organizer_ic"
                                                class="form-label required"
                                            >
                                                <i class="fas fa-id-card"></i>
                                                No. KP / Pasport
                                            </label>
                                            <input
                                                type="text"
                                                id="organizer_ic"
                                                name="organizer_ic"
                                                class="form-control"
                                                placeholder="e.g., 123456-78-9012"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label
                                                for="organization"
                                                class="form-label"
                                            >
                                                <i class="fas fa-building"></i>
                                                Organisasi
                                            </label>
                                            <input
                                                type="text"
                                                id="organization"
                                                name="organization"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label
                                                for="phone"
                                                class="form-label required"
                                            >
                                                <i class="fas fa-phone"></i> No.
                                                Telefon
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                                <input
                                                    type="tel"
                                                    id="phone"
                                                    name="phone"
                                                    class="form-control"
                                                    required
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label
                                            for="email"
                                            class="form-label required"
                                        >
                                            <i class="fas fa-envelope"></i>
                                            Email
                                        </label>
                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            class="form-control"
                                            required
                                        />
                                    </div>
                                </div>

                                <!-- Tempahan Section -->
                                <div class="form-section">
                                    <h5 class="form-section-title">
                                        <i class="fas fa-calendar-alt"></i>
                                        Maklumat Tempahan
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label
                                                for="start_at"
                                                class="form-label required"
                                            >
                                                <i
                                                    class="fas fa-play-circle"
                                                ></i>
                                                Tarikh & Masa Mula
                                            </label>
                                            <input
                                                type="datetime-local"
                                                id="start_at"
                                                name="start_at"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label
                                                for="end_at"
                                                class="form-label required"
                                            >
                                                <i
                                                    class="fas fa-stop-circle"
                                                ></i>
                                                Tarikh & Masa Tamat
                                            </label>
                                            <input
                                                type="datetime-local"
                                                id="end_at"
                                                name="end_at"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="purpose" class="form-label">
                                            <i class="fas fa-bullseye"></i>
                                            Tujuan / Aktiviti
                                        </label>
                                        <textarea
                                            id="purpose"
                                            name="purpose"
                                            class="form-control"
                                            rows="3"
                                            placeholder="Contoh: Mesyuarat, Majlis Rasmi, Bengkel..."
                                        ></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label
                                            for="attendees"
                                            class="form-label"
                                        >
                                            <i class="fas fa-users"></i>
                                            Bilangan Hadir
                                        </label>
                                        <input
                                            type="number"
                                            id="attendees"
                                            name="attendees"
                                            min="1"
                                            class="form-control"
                                            placeholder="Masukkan jumlah peserta"
                                        />
                                    </div>
                                </div>

                                <!-- Equipment Section -->
                                <div class="form-section">
                                    <h5 class="form-section-title">
                                        <i class="fas fa-tools"></i> Permintaan
                                        Peralatan Tambahan
                                    </h5>
                                    <p class="text-muted mb-3">
                                        Sila pilih peralatan tambahan yang
                                        diperlukan (caj tambahan dikenakan)
                                    </p>

                                    <div id="equipment-list">
                                        <!-- Aircond -->
                                        <div class="equipment-item">
                                            <input
                                                type="checkbox"
                                                class="equipment-checkbox"
                                                id="equipment-aircond"
                                                name="equipment[]"
                                                value="aircond"
                                                data-price="50"
                                            />
                                            <div class="equipment-details">
                                                <label
                                                    for="equipment-aircond"
                                                    class="form-label mb-1"
                                                >
                                                    <i
                                                        class="fas fa-snowflake"
                                                    ></i>
                                                    Penyaman Udara (Aircond)
                                                </label>
                                                <div class="form-text">
                                                    Penyaman udara tambahan
                                                    untuk kawasan tertentu
                                                </div>
                                            </div>
                                            <div class="equipment-price">
                                                RM50
                                            </div>
                                        </div>

                                        <!-- PA System -->
                                        <div class="equipment-item">
                                            <input
                                                type="checkbox"
                                                class="equipment-checkbox"
                                                id="equipment-pa"
                                                name="equipment[]"
                                                value="pa_system"
                                                data-price="80"
                                            />
                                            <div class="equipment-details">
                                                <label
                                                    for="equipment-pa"
                                                    class="form-label mb-1"
                                                >
                                                    <i
                                                        class="fas fa-volume-up"
                                                    ></i>
                                                    Sistem PA (Public Address)
                                                </label>
                                                <div class="form-text">
                                                    Sistem pembesar suara untuk
                                                    acara besar
                                                </div>
                                            </div>
                                            <div class="equipment-price">
                                                RM80
                                            </div>
                                        </div>

                                        <!-- Fan -->
                                        <div class="equipment-item">
                                            <input
                                                type="checkbox"
                                                class="equipment-checkbox"
                                                id="equipment-fan"
                                                name="equipment[]"
                                                value="fan"
                                                data-price="20"
                                            />
                                            <div class="equipment-details">
                                                <label
                                                    for="equipment-fan"
                                                    class="form-label mb-1"
                                                >
                                                    <i class="fas fa-fan"></i>
                                                    Kipas
                                                </label>
                                                <div class="form-text">
                                                    Kipas angin tambahan
                                                </div>
                                            </div>
                                            <div class="equipment-price">
                                                RM20
                                            </div>
                                        </div>

                                        <!-- Tables -->
                                        <div class="equipment-item">
                                            <input
                                                type="checkbox"
                                                class="equipment-checkbox"
                                                id="equipment-tables"
                                                name="equipment[]"
                                                value="tables"
                                                data-price="30"
                                            />
                                            <div class="equipment-details">
                                                <label
                                                    for="equipment-tables"
                                                    class="form-label mb-1"
                                                >
                                                    <i class="fas fa-table"></i>
                                                    Meja Tambahan
                                                </label>
                                                <div class="form-text">
                                                    Set meja untuk 10 orang
                                                </div>
                                            </div>
                                            <div class="equipment-price">
                                                RM30
                                            </div>
                                        </div>

                                        <!-- Chairs -->
                                        <div class="equipment-item">
                                            <input
                                                type="checkbox"
                                                class="equipment-checkbox"
                                                id="equipment-chairs"
                                                name="equipment[]"
                                                value="chairs"
                                                data-price="25"
                                            />
                                            <div class="equipment-details">
                                                <label
                                                    for="equipment-chairs"
                                                    class="form-label mb-1"
                                                >
                                                    <i class="fas fa-chair"></i>
                                                    Kerusi Tambahan
                                                </label>
                                                <div class="form-text">
                                                    Set kerusi untuk 10 orang
                                                </div>
                                            </div>
                                            <div class="equipment-price">
                                                RM25
                                            </div>
                                        </div>

                                        <!-- Projector -->
                                        <div class="equipment-item">
                                            <input
                                                type="checkbox"
                                                class="equipment-checkbox"
                                                id="equipment-projector"
                                                name="equipment[]"
                                                value="projector"
                                                data-price="60"
                                            />
                                            <div class="equipment-details">
                                                <label
                                                    for="equipment-projector"
                                                    class="form-label mb-1"
                                                >
                                                    <i class="fas fa-video"></i>
                                                    Projektor
                                                </label>
                                                <div class="form-text">
                                                    Projektor dan skrin untuk
                                                    pembentangan
                                                </div>
                                            </div>
                                            <div class="equipment-price">
                                                RM60
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Custom Equipment -->
                                    <div class="mt-4">
                                        <label
                                            for="custom_equipment"
                                            class="form-label"
                                        >
                                            <i class="fas fa-plus-circle"></i>
                                            Peralatan Lain (Nyatakan)
                                        </label>
                                        <textarea
                                            id="custom_equipment"
                                            name="custom_equipment"
                                            class="form-control"
                                            rows="2"
                                            placeholder="Sila nyatakan peralatan lain yang diperlukan..."
                                        ></textarea>
                                    </div>
                                </div>

                                <!-- Total Section -->
                                <div class="total-section">
                                    <h5 class="form-section-title mb-3">
                                        <i class="fas fa-calculator"></i>
                                        Ringkasan Bayaran
                                    </h5>

                                    <div class="total-row">
                                        <div class="total-label">
                                            Harga Dewan:
                                        </div>
                                        <div
                                            class="total-amount"
                                            id="hall-price"
                                        >
                                            RM0
                                        </div>
                                    </div>

                                    <div class="total-row">
                                        <div class="total-label">
                                            Peralatan Tambahan:
                                        </div>
                                        <div
                                            class="total-amount"
                                            id="equipment-price"
                                        >
                                            RM0
                                        </div>
                                    </div>

                                    <div class="total-row">
                                        <div class="total-label">
                                            Jumlah Keseluruhan:
                                        </div>
                                        <div
                                            class="total-amount grand-total"
                                            id="total-amount"
                                        >
                                            RM0
                                        </div>
                                    </div>

                                    <div
                                        class="price-breakdown"
                                        id="price-breakdown"
                                    >
                                        Pilih dewan dan peralatan untuk melihat
                                        ringkasan harga
                                    </div>
                                </div>

                                <!-- Dokumen Section -->
                                <div class="form-section">
                                    <h5 class="form-section-title">
                                        <i class="fas fa-file-upload"></i>
                                        Dokumen Sokongan
                                    </h5>
                                    <div class="mb-3">
                                        <label
                                            for="attachment"
                                            class="form-label"
                                        >
                                            <i class="fas fa-paperclip"></i>
                                            Sokongan / Dokumen (permit / surat)
                                        </label>
                                        <div class="form-text">
                                            Nota: Jika tiada surat sokongan,
                                            sila masukkan salinan KP anda
                                        </div>
                                        <input
                                            type="file"
                                            id="attachment"
                                            name="attachment"
                                            class="form-control"
                                            accept=".pdf,.jpg,.jpeg,.png"
                                        />
                                        <div class="form-text">
                                            Format yang diterima: PDF, JPG,
                                            JPEG, PNG (Maksimum: 5MB)
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center mt-4">
                                    <button
                                        type="submit"
                                        class="btn btn-mdkk px-5 py-3"
                                        id="submitBtn"
                                        onclick="validateAndSubmit()"
                                    >
                                        <i class="fas fa-paper-plane me-2"></i
                                        >Hantar Permohonan
                                    </button>

                                    <div class="mt-3">
                                        <a
                                            href="<?php echo e(route('dashboard')); ?>"
                                            class="btn btn-outline-secondary px-4"
                                        >
                                            <i
                                                class="fas fa-arrow-left me-2"
                                            ></i
                                            >Kembali ke Dashboard
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // Form submission handler
            document
                .getElementById("bookingForm")
                .addEventListener("submit", function (e) {
                    e.preventDefault();

                    // Simple validation
                    const hallId = document.getElementById("hall_id").value;
                    if (!hallId) {
                        showError("Sila pilih dewan untuk tempahan");
                        return;
                    }

                    const submitBtn = document.getElementById("submitBtn");
                    submitBtn.disabled = true;
                    submitBtn.innerHTML =
                        '<i class="fas fa-spinner fa-spin me-2"></i>Menghantar...';

                    // Simulate form submission
                    setTimeout(function () {
                        showSuccess(
                            "Permohonan tempahan anda telah berjaya dihantar!",
                        );
                        submitBtn.disabled = false;
                        submitBtn.innerHTML =
                            '<i class="fas fa-paper-plane me-2"></i>Hantar Permohonan';
                    }, 2000);
                });

            // Date validation
            document.addEventListener("DOMContentLoaded", function () {
                const startDate = document.getElementById("start_at");
                const endDate = document.getElementById("end_at");

                // Set minimum date to today
                const today = new Date().toISOString().slice(0, 16);
                startDate.min = today;
                endDate.min = today;

                // Update end date min when start date changes
                startDate.addEventListener("change", function () {
                    endDate.min = this.value;
                });

                // Hall selection and price calculation
                const hallSelect = document.getElementById("hall_id");
                const equipmentCheckboxes = document.querySelectorAll(
                    ".equipment-checkbox",
                );

                // Function to calculate total
                function calculateTotal() {
                    let hallPrice = 0;
                    let equipmentPrice = 0;
                    let selectedEquipment = [];

                    // Get hall price
                    const selectedHall =
                        hallSelect.options[hallSelect.selectedIndex];
                    if (selectedHall && selectedHall.dataset.price) {
                        hallPrice = parseFloat(selectedHall.dataset.price);
                    }

                    // Get equipment prices
                    equipmentCheckboxes.forEach((checkbox) => {
                        if (checkbox.checked) {
                            const price = parseFloat(checkbox.dataset.price);
                            equipmentPrice += price;
                            selectedEquipment.push({
                                name: checkbox.nextElementSibling
                                    .querySelector(".form-label")
                                    .textContent.trim(),
                                price: price,
                            });
                        }
                    });

                    // Update display
                    document.getElementById("hall-price").textContent =
                        "RM" + hallPrice;
                    document.getElementById("equipment-price").textContent =
                        "RM" + equipmentPrice;
                    document.getElementById("total-amount").textContent =
                        "RM" + (hallPrice + equipmentPrice);

                    // Update price breakdown
                    let breakdownText = "";
                    if (hallPrice > 0) {
                        breakdownText += `Dewan: RM${hallPrice}`;
                    }

                    if (selectedEquipment.length > 0) {
                        if (breakdownText) breakdownText += " | ";
                        breakdownText +=
                            "Peralatan: " +
                            selectedEquipment
                                .map(
                                    (eq) =>
                                        eq.name.split(" ")[0] +
                                        " (RM" +
                                        eq.price +
                                        ")",
                                )
                                .join(", ");
                    }

                    document.getElementById("price-breakdown").textContent =
                        breakdownText ||
                        "Pilih dewan dan peralatan untuk melihat ringkasan harga";

                    // Update item styling
                    equipmentCheckboxes.forEach((checkbox) => {
                        const item = checkbox.closest(".equipment-item");
                        if (checkbox.checked) {
                            item.classList.add("selected");
                        } else {
                            item.classList.remove("selected");
                        }
                    });
                }

                // Add event listeners
                hallSelect.addEventListener("change", calculateTotal);
                equipmentCheckboxes.forEach((checkbox) => {
                    checkbox.addEventListener("change", calculateTotal);
                });

                // Initialize total calculation
                calculateTotal();
            });

            // Helper functions for alerts
            function showSuccess(message) {
                const successAlert = document.getElementById("successAlert");
                successAlert.querySelector("div > div").innerHTML =
                    `<strong>Berjaya!</strong> ${message}`;
                successAlert.classList.remove("d-none");
                document.getElementById("errorAlert").classList.add("d-none");
            }

            function showError(message) {
                const errorAlert = document.getElementById("errorAlert");
                const errorList = document.getElementById("errorList");
                errorList.innerHTML = `<li>${message}</li>`;
                errorAlert.classList.remove("d-none");
                document.getElementById("successAlert").classList.add("d-none");
            }
        </script>
    </body>
</html>
<?php /**PATH C:\laragon\www\HallReservationMDKK\resources\views/bookings/create.blade.php ENDPATH**/ ?>