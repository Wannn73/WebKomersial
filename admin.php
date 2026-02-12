<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - GrandHall</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-slate-50 font-sans">

    <!-- Login Section -->
    <div id="login-section" class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-sm w-full border border-slate-200">
            <div class="text-center mb-8">
                <div
                    class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4">
                    G</div>
                <h2 class="text-2xl font-bold text-slate-800">Admin Login</h2>
                <p class="text-slate-500 text-sm">Masuk untuk mengelola booking</p>
            </div>
            <form id="login-form" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                    <input type="text" id="username"
                        class="w-full rounded-lg border-slate-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="admin">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                    <input type="password" id="password"
                        class="w-full rounded-lg border-slate-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="••••••••">
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-bold hover:bg-blue-700 transition">Masuk
                    Dashboard</button>
            </form>
        </div>
    </div>

    <!-- Dashboard Section (Hidden by default) -->
    <div id="dashboard-section" class="hidden min-h-screen">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 w-64 bg-slate-900 text-white transition-transform transform -translate-x-full md:translate-x-0 z-30"
            id="sidebar">
            <div class="p-6 border-b border-slate-800 flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center font-bold">G</div>
                <span class="font-bold text-lg">GrandHall Admin</span>
            </div>
            <nav class="p-4 space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-600 rounded-lg text-white">
                    <span class="material-icons">dashboard</span> Dashboard
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition">
                    <span class="material-icons">event</span> Semua Booking
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition">
                    <span class="material-icons">settings</span> Pengaturan
                </a>
                <div class="pt-8 mt-8 border-t border-slate-800">
                    <button id="logout-btn"
                        class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-900/20 w-full rounded-lg transition">
                        <span class="material-icons">logout</span> Keluar
                    </button>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="md:ml-64 p-4 md:p-8">
            <!-- Mobile Header -->
            <div class="md:hidden flex justify-between items-center mb-6">
                <h1 class="text-xl font-bold">Dashboard</h1>
                <button id="menu-btn" class="p-2 bg-white rounded shadow text-slate-600"><span
                        class="material-icons">menu</span></button>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <p class="text-slate-500 text-sm mb-1">Booking Pending</p>
                    <h3 class="text-3xl font-bold text-blue-600">3</h3>
                    <p class="text-xs text-blue-500 mt-2 font-medium">Perlu tindakan segera</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <p class="text-slate-500 text-sm mb-1">Booking Bulan Ini</p>
                    <h3 class="text-3xl font-bold text-green-600">12</h3>
                    <p class="text-xs text-green-500 mt-2 font-medium">+2 dari bulan lalu</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <p class="text-slate-500 text-sm mb-1">Total Pendapatan</p>
                    <h3 class="text-3xl font-bold text-slate-800">Rp 150jt</h3>
                    <p class="text-xs text-slate-400 mt-2 font-medium">Estimasi bulan ini</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Calendar Manager -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                        <h3 class="font-bold text-lg text-slate-800">Manajemen Kalender</h3>
                        <div class="flex gap-2">
                            <button id="prev-month-admin" class="p-1 hover:bg-slate-100 rounded-full"><span
                                    class="material-icons text-slate-500">chevron_left</span></button>
                            <span id="month-year-admin" class="font-bold text-slate-700"></span>
                            <button id="next-month-admin" class="p-1 hover:bg-slate-100 rounded-full"><span
                                    class="material-icons text-slate-500">chevron_right</span></button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="bg-yellow-50 text-yellow-800 text-sm p-3 rounded-lg mb-4 flex gap-2">
                            <span class="material-icons text-sm">info</span>
                            Klik tanggal untuk mengubah status (Available <-> Booked) secara manual.
                        </div>
                        <div class="grid grid-cols-7 gap-2 mb-2 text-center text-sm font-bold text-slate-400">
                            <div>Min</div>
                            <div>Sen</div>
                            <div>Sel</div>
                            <div>Rab</div>
                            <div>Kam</div>
                            <div>Jum</div>
                            <div>Sab</div>
                        </div>
                        <div id="admin-calendar-days" class="calendar-grid">
                            <!-- JS Generated -->
                        </div>
                    </div>
                </div>

                <!-- Pending Requests -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 h-fit">
                    <div class="p-6 border-b border-slate-100">
                        <h3 class="font-bold text-lg text-slate-800">Permintaan Baru</h3>
                    </div>
                    <div class="divide-y divide-slate-100">
                        <!-- Request Item 1 -->
                        <div class="p-4 hover:bg-slate-50 transition">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-slate-800">Budi Santoso</h4>
                                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full font-bold">12
                                    Des</span>
                            </div>
                            <p class="text-sm text-slate-600 mb-3">Paket: Grand Wedding</p>
                            <div class="flex gap-2">
                                <button
                                    class="flex-1 bg-green-500 text-white py-1.5 rounded text-sm font-medium hover:bg-green-600 transition"
                                    onclick="alert('Fitur Approve: Status database diubah jadi Approved')">Terima</button>
                                <button
                                    class="flex-1 border border-slate-300 text-slate-600 py-1.5 rounded text-sm font-medium hover:bg-slate-100 transition">Tolak</button>
                            </div>
                        </div>
                        <!-- Request Item 2 -->
                        <div class="p-4 hover:bg-slate-50 transition">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-slate-800">PT. Maju Mundur</h4>
                                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full font-bold">15
                                    Des</span>
                            </div>
                            <p class="text-sm text-slate-600 mb-3">Paket: Corporate Full Day</p>
                            <div class="flex gap-2">
                                <button
                                    class="flex-1 bg-green-500 text-white py-1.5 rounded text-sm font-medium hover:bg-green-600 transition"
                                    onclick="alert('Fitur Approve: Status database diubah jadi Approved')">Terima</button>
                                <button
                                    class="flex-1 border border-slate-300 text-slate-600 py-1.5 rounded text-sm font-medium hover:bg-slate-100 transition">Tolak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="assets/js/admin.js"></script>
</body>

</html>