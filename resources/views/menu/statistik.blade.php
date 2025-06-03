<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Alumni - BKK SMKN 1 Bengkulu</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f0fdfa;
            
        }
        
        .stat-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.85);
            transition: all 0.3s ease;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
        
        .social-icon {
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            transform: scale(1.1);
        }
        
        .contact-card {
            transition: all 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-3px);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center">
    <!-- Header -->
    <header id="header" class="sticky top-0 bg-white shadow-md z-50 w-full">
        <div class="container mx-auto px-5 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-600 hover:text-teal-900 flex items-center space-x-2 transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="w-full flex-1 py-8 px-4">
        <div class="container mx-auto">
            <!-- Page Header -->
            <div class="text-center mb-12 animate-fade-in" style="animation-delay: 0.1s">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-600 mb-4">Statistik Data Bursa Kerjo Kito</h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Visualisasi data alumni SMKN 1 Bengkulu untuk membantu analisis dan pengembangan karir</p>
            </div>

            <!-- Total Alumni Card -->
            <div class="stat-card rounded-xl p-6 mb-8 max-w-md mx-auto animate-fade-in" style="animation-delay: 0.2s">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-teal-100 mb-4">
                        <i class="fas fa-users text-teal-600 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 font-medium mb-2">Total Seluruh Data Alumni</p>
                    <div class="text-4xl font-bold text-gray-600">{{ number_format(\App\Models\Alumni::count()) }}</div>
                </div>
            </div>

            <!-- Charts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl w-full mx-auto">
                <!-- Alumni Jurusan -->
                <div class="stat-card rounded-xl p-6 animate-fade-in" style="animation-delay: 0.3s">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 mr-3">
                            <i class="fas fa-graduation-cap text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Distribusi Alumni per Jurusan</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartJurusan"></canvas>
                    </div>
                </div>

                <!-- Alumni per Tahun -->
                <div class="stat-card rounded-xl p-6 animate-fade-in" style="animation-delay: 0.4s">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-purple-100 mr-3">
                            <i class="fas fa-calendar-alt text-purple-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Tren Kelulusan per Tahun</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartTahun"></canvas>
                    </div>
                </div>

                <!-- Rentang Gaji -->
                <div class="stat-card rounded-xl p-6 animate-fade-in" style="animation-delay: 0.5s">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-100 mr-3">
                            <i class="fas fa-money-bill-wave text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Distribusi Rentang Gaji</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartGaji"></canvas>
                    </div>
                </div>

                <!-- Rasio Profesi Alumni -->
                <div class="stat-card rounded-xl p-6 animate-fade-in" style="animation-delay: 0.6s">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-yellow-100 mr-3">
                            <i class="fas fa-briefcase text-yellow-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Distribusi Profesi Alumni</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartProfesi"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
     @include('components.footer')

    <!-- Chart.js scripts -->
    <script>
        // Color palette
        const colors = {
            primary: '#008b8b',
            secondary: '#34a853',
            accent: '#2563eb',
            danger: '#ef4444',
            warning: '#f59e0b',
            info: '#3b82f6',
            purple: '#8b5cf6',
            pink: '#ec4899'
        };

        // Jurusan Chart
        var ctxJurusan = document.getElementById('chartJurusan').getContext('2d');
        new Chart(ctxJurusan, {
            type: 'bar',
            data: {
                labels: @json($jurusanData->pluck('jurusan')),
                datasets: [{
                    label: 'Jumlah Alumni',
                    data: @json($jurusanData->pluck('total')),
                    backgroundColor: [
                        colors.primary,
                        colors.secondary,
                        colors.accent,
                        colors.purple,
                        colors.pink,
                        colors.warning
                    ],
                    borderColor: '#fff',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: ${context.raw.toLocaleString()}`;
                            }
                        }
                    }
                },
                scales: { 
                    y: { 
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // Tahun Lulus Chart
        var ctxTahun = document.getElementById('chartTahun').getContext('2d');
        new Chart(ctxTahun, {
            type: 'line',
            data: {
                labels: @json($tahunData->pluck('tahun_lulus')),
                datasets: [{
                    label: 'Jumlah Lulusan',
                    data: @json($tahunData->pluck('total')),
                    borderColor: colors.accent,
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    borderWidth: 3,
                    pointBackgroundColor: colors.accent,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: ${context.raw.toLocaleString()}`;
                            }
                        }
                    }
                },
                scales: { 
                    y: { 
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // Gaji Chart
        var ctxGaji = document.getElementById('chartGaji').getContext('2d');
        new Chart(ctxGaji, {
            type: 'pie',
            data: {
                labels: @json(array_keys($gajiData)),
                datasets: [{
                    data: @json(array_values($gajiData)),
                    backgroundColor: [
                        colors.primary,
                        colors.secondary,
                        colors.accent,
                        colors.purple,
                        colors.pink,
                        colors.warning
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Profesi Chart
        var ctxProfesi = document.getElementById('chartProfesi').getContext('2d');
        new Chart(ctxProfesi, {
            type: 'doughnut',
            data: {
                labels: @json(array_keys($profesiData)),
                datasets: [{
                    data: @json(array_values($profesiData)),
                    backgroundColor: [
                        colors.primary,
                        colors.secondary,
                        colors.accent,
                        colors.purple,
                        colors.pink,
                        colors.warning
                    ],
                    borderColor: '#fff',
                    borderWidth: 2,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>