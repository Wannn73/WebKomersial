<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>GrandHall - Reservasi & Penyewaan Gedung</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2463eb", /* Menggunakan warna biru dari Code 1 agar seragam */
                        "primary-dark": "#1d4ed8",
                        "background-light": "#f6f6f8",
                        "background-dark": "#111621",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .pattern-grid-lg {
            background-image: linear-gradient(currentColor 1px, transparent 1px), linear-gradient(90deg, currentColor 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-100 font-display selection:bg-primary/20">

    <!-- Navbar -->
    <nav
        class="fixed w-full z-50 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div
                        class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-primary/30">
                        G
                    </div>
                    <span class="font-bold text-xl tracking-tight text-slate-900 dark:text-white">GrandHall<span
                            class="text-primary">.</span></span>
                </div>
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium transition-colors"
                        href="#">Beranda</a>
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium transition-colors"
                        href="#about">Tentang Kami</a>
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium transition-colors"
                        href="#facilities">Fasilitas</a>
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary font-medium transition-colors"
                        href="#gallery">Galeri</a>
                </div>
                <!-- CTA Button -->
                <div class="hidden md:flex">
                    <a class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-lg font-medium shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5"
                        href="#booking">
                        Booking Sekarang
                    </a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-slate-500 hover:text-slate-700 dark:text-slate-400 focus:outline-none">
                        <span class="material-icons">menu</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-28 pb-32 md:pt-40 md:pb-48 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img alt="Grand luxurious hall interior" class="w-full h-full object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiVCf9J0UiFznZ_JwGGWTWQXEwWdDYuY_oAZTxfz8rT0X8SAEgAkknaPAU2-Hqzb3_Lkw4aS_g8xaSkA2LaKaEUlfwPEpz5iIsF7d06YZEFXJ40rGoCBCtn0Rmdr51Y_TwT7UtJLt8SPi06_vELuNCr5pycIfJOKY26je7N0kEq_zUDm3m5Blfabwrk4lXgOnER5CgTNu0mj7MAj9hcY1REsyrh4qm1PnoWngvSVgGu8T_95lVBDUf10PwfcnTl_6Mt-Bj8xhzJM4B" />
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/70 to-slate-900/30"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
            <div class="max-w-3xl text-white">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-sm font-medium text-blue-100 mb-8">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                    Tersedia untuk Booking 2024
                </div>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight mb-8 font-display">
                    Gedung Serbaguna <br /><span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-300">Eksklusif
                        &amp; Mewah</span>
                </h1>
                <p class="text-lg md:text-xl text-slate-200 mb-10 font-light leading-relaxed max-w-2xl">
                    Tempat sempurna untuk momen istimewa Anda. Kami menyediakan ruang elegan dengan fasilitas premium
                    untuk pernikahan, seminar, dan acara korporat.
                </p>
                <div class="flex flex-col sm:flex-row gap-5">
                    <a class="bg-primary hover:bg-primary-dark text-white text-center px-8 py-4 rounded-xl font-bold text-lg shadow-xl shadow-primary/40 transition-all hover:scale-105 flex items-center justify-center gap-2"
                        href="#booking">
                        <span class="material-icons text-xl">calendar_today</span>
                        Reservasi Sekarang
                    </a>
                    <a class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white text-center px-8 py-4 rounded-xl font-semibold text-lg border border-white/30 transition-all flex items-center justify-center gap-2"
                        href="#gallery">
                        <span class="material-icons text-xl">photo_library</span>
                        Lihat Galeri
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- About Section -->
    <section class="py-16 md:py-24 bg-white dark:bg-slate-900" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-20">
                <div class="w-full md:w-1/2 relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-primary/10 rounded-full blur-2xl"></div>
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img alt="Elegant wedding setup"
                            class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBpmTmYDtcKD3t5cuGg_k2offhhVPyFYZEYN344AaTK2cI4H1V4q6pyWHIO2dVmo6dS3OWb34fLO-LxOXqsb-EldQm6o_yi5wDzWMJAmh1VmDOmKSmxh6PzKU63kOctgr1ftOeeoj36TaDPFJQZq4HdGQN_WqSvPqSFhe0ivjl0AA4Hqq_yDhyUX3eSS5xIzzLCX_4dSybyGUOL8t6u5wpu8y599z7MS8orwibIaHWgCGzBXJjGNkrdRlakDk5QGTfK00gzmPv87GL7" />
                    </div>
                    <!-- Experience Badge -->
                    <div
                        class="absolute -bottom-6 -right-6 bg-white dark:bg-slate-800 p-6 rounded-xl shadow-xl border border-slate-100 dark:border-slate-700 max-w-xs">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-icons">verified</span>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900 dark:text-white text-lg">Terpercaya</p>
                                <p class="text-sm text-slate-500">Pilihan utama event organizer profesional.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <span class="text-primary font-semibold tracking-wider text-sm uppercase mb-2 block">Tentang
                        GrandHall</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-6">Mewujudkan Acara
                        Impian Anda Menjadi Kenyataan</h2>
                    <p class="text-slate-600 dark:text-slate-300 mb-6 leading-relaxed text-lg">
                        Berlokasi strategis di jantung kota, GrandHall menawarkan ruang serbaguna dengan desain
                        arsitektur modern yang memukau. Kami memahami bahwa setiap acara memiliki cerita uniknya
                        sendiri.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3">
                            <span class="material-icons text-primary mt-1">check_circle</span>
                            <span class="text-slate-700 dark:text-slate-200">Lokasi strategis dekat akses tol &amp;
                                hotel berbintang.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="material-icons text-primary mt-1">check_circle</span>
                            <span class="text-slate-700 dark:text-slate-200">Tim manajemen event profesional siap
                                membantu.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="material-icons text-primary mt-1">check_circle</span>
                            <span class="text-slate-700 dark:text-slate-200">Paket fleksibel sesuai kebutuhan budget
                                Anda.</span>
                        </li>
                    </ul>
                    <a class="text-primary font-semibold hover:text-blue-700 flex items-center gap-1 group"
                        href="#facilities">
                        Pelajari Lebih Lanjut
                        <span
                            class="material-icons text-sm transform group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="py-16 md:py-24 bg-background-light dark:bg-background-dark" id="facilities">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-primary font-semibold tracking-wider text-sm uppercase mb-2 block">Fasilitas
                    Unggulan</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Semua yang Anda Butuhkan
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg">Kami menyediakan fasilitas kelas dunia untuk
                    memastikan kenyamanan tamu dan kelancaran acara Anda.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Facility Cards -->
                <div
                    class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-sm hover:shadow-xl transition-shadow border border-slate-100 dark:border-slate-700 group">
                    <div
                        class="w-14 h-14 bg-blue-50 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
                        <span
                            class="material-icons text-primary text-3xl group-hover:text-white transition-colors">ac_unit</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Full AC Central</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Suhu ruangan yang sejuk dan
                        nyaman dengan kontrol temperatur modern di seluruh area gedung.</p>
                </div>
                <div
                    class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-sm hover:shadow-xl transition-shadow border border-slate-100 dark:border-slate-700 group">
                    <div
                        class="w-14 h-14 bg-blue-50 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
                        <span
                            class="material-icons text-primary text-3xl group-hover:text-white transition-colors">speaker_group</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Premium Sound</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Sistem audio JBL Professional
                        integrated, menjamin suara jernih untuk musik maupun pidato.</p>
                </div>
                <div
                    class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-sm hover:shadow-xl transition-shadow border border-slate-100 dark:border-slate-700 group">
                    <div
                        class="w-14 h-14 bg-blue-50 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
                        <span
                            class="material-icons text-primary text-3xl group-hover:text-white transition-colors">local_parking</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Parkir Luas</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Area parkir aman berkapasitas
                        300 mobil dan 500 motor, dilengkapi keamanan 24 jam.</p>
                </div>
                <div
                    class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-sm hover:shadow-xl transition-shadow border border-slate-100 dark:border-slate-700 group">
                    <div
                        class="w-14 h-14 bg-blue-50 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
                        <span
                            class="material-icons text-primary text-3xl group-hover:text-white transition-colors">chair</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Ruang VIP</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Dua ruang tunggu VIP eksklusif
                        dengan toilet pribadi dan akses langsung ke panggung utama.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 md:py-24 bg-white dark:bg-slate-900 overflow-hidden" id="gallery">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div class="max-w-2xl">
                    <span class="text-primary font-semibold tracking-wider text-sm uppercase mb-2 block">Galeri
                        Foto</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">Inspirasi Acara Anda</h2>
                </div>
                <a class="hidden md:flex items-center gap-2 text-slate-600 dark:text-slate-300 hover:text-primary transition-colors font-medium"
                    href="#">
                    Lihat Semua Galeri <span class="material-icons">arrow_forward</span>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[300px]">
                <!-- Gallery Items -->
                <div class="md:col-span-2 relative group overflow-hidden rounded-xl cursor-pointer">
                    <img alt="Conference hall"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuARlIYfcSfGiI61ang7DTmVEXWPqFT-Xbb3ITYQ4ot_C6jgK2QgaLjFzuS7SJkuxlLbdzw_bJ6kAdahntYhx0iv-ABndBsz-nD33lueZvpwalLzEl0QDZFnc-Cr8JarYBAUegL8ZzpcZYEPJY5VoRAAmrKSDwKnp_3it0pngFsUpVkhiJr1wn_CfTyL6iQwvHujEYmD09rhh-VT0bPScHIYVyRX9Vi8ZaJV81TwOTvPeOgwbDSvYzh4YYAArw-eQ9hxsFFwh1LCbsKF" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div
                            class="text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <h4 class="font-bold text-xl">Seminar Korporat TechIndo</h4>
                            <p class="text-sm text-slate-200">Main Hall A</p>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-xl cursor-pointer">
                    <img alt="Wedding decoration"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUr1vABd4NSeR7I3cWq9er0ZpLCBMDD5WioITKj_R8yyvFtmq1h0WpxZltB7e5sH8TO-bw19xiP4u4refStf55EfhXjeslolQfdxBIuIVaL-LKPM6uMEm-qyb1En2umLhA5vDBZAJkRATU1MxzjwjUGsAsN2iTbVJk4zmuNJRT-i2svZ_-pfMix0En_b6dhxSmX-7ITnW-xA4yl8IorFOBOj-tMQdTgrGKCUih9xe7EheCOchsqUrakJfdQUAA8B1AFzjzhxSFF38x" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div
                            class="text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <h4 class="font-bold text-xl">Wedding Fair 2023</h4>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-xl cursor-pointer">
                    <img alt="Outdoor setup"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB79nSCQvdWtZwSyrc1_lcNLLJ1mVtLWty7tT-rkJBlIjlTS9DEO6kVyQa13zsBn1YmdU2VjDY7NWyAR6SMJBQZBPbynvAijHNW_RmIoSsKNV784kXckPRqUPHRGyc-d7ywmWTlnikZIe2xGa6iLleFGNW0MFl01lX1B4CfReb0YEdljv7CgYPkFCbGVhfd16iNLW9JxT0HkThTY488rSMlmrzHARwBCjifz96fDK4sXxYuPC3AZ8buOtn_ycmQZSxiBUyvH0LDwHrs" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div
                            class="text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <h4 class="font-bold text-xl">Garden Party Area</h4>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 relative group overflow-hidden rounded-xl cursor-pointer">
                    <img alt="Fashion show"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBInquUgguyFN3nEfBvgbCOeiuSUhV-O2y9FUCjr-anLvFyY1EmhP1lyuqPJsq8NuDgSqXpeimLb14ZVYMpKFt3PccubWWsVTjp8K792kfWNZXl3UUnypNUNe9ATNfb7nP38Dudcuv0zIsS5xrkPYaoLzEX7t9J8ojjRyfgzfY1Eiu29BWr8FLJ7e70cug8Mju6MLbcaJzgUL91LZpWchrnavX-OcSW9b67X6t7wO8ZknjeR1wWvMeYj1Ijnk254f0lzOLSi87lKTTT" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div
                            class="text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <h4 class="font-bold text-xl">Jakarta Fashion Week Spot</h4>
                            <p class="text-sm text-slate-200">Main Hall B</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-16 md:py-24 bg-slate-50 dark:bg-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Pilihan Paket Sewa</h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg">Solusi hemat dan lengkap untuk berbagai kebutuhan
                    acara Anda.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 p-8 flex flex-col relative overflow-hidden">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Basic Wedding</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mb-6">Cocok untuk acara intimate wedding.</p>
                    <div class="text-3xl font-bold text-primary mb-6">Rp 25.000.000</div>
                    <ul class="space-y-3 mb-8 flex-1 text-sm text-slate-600 dark:text-slate-300">
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-green-500 text-base">check</span> Sewa Gedung 6 Jam</li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-green-500 text-base">check</span> 300 Kursi Futura</li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-green-500 text-base">check</span> Sound System Standard</li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-green-500 text-base">check</span> 2 Ruang Rias</li>
                    </ul>
                    <button
                        class="w-full py-3 rounded-lg border-2 border-primary text-primary font-semibold hover:bg-primary hover:text-white transition-colors">Pilih
                        Paket</button>
                </div>
                <!-- Card 2 (Highlight) -->
                <div
                    class="bg-slate-900 dark:bg-slate-700 rounded-2xl shadow-xl p-8 flex flex-col relative transform md:-translate-y-4 md:border-t-4 md:border-primary">
                    <div class="absolute top-0 right-0 bg-primary text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                        TERPOPULER</div>
                    <h3 class="text-xl font-bold text-white mb-2">Grand Wedding</h3>
                    <p class="text-slate-300 text-sm mb-6">Paket lengkap untuk resepsi mewah.</p>
                    <div class="text-3xl font-bold text-white mb-6">Rp 45.000.000</div>
                    <ul class="space-y-3 mb-8 flex-1 text-sm text-slate-300">
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-primary text-base">check</span> Sewa Gedung 8 Jam</li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-primary text-base">check</span> 800 Kursi Tiffany</li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-primary text-base">check</span> Full AC &amp; Lighting</li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-primary text-base">check</span> Dekorasi Pelaminan</li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-primary text-base">check</span> 2 VIP Room</li>
                    </ul>
                    <a href="#booking"
                        class="block text-center w-full py-3 rounded-lg bg-primary text-white font-semibold hover:bg-blue-600 transition-colors shadow-lg shadow-blue-900/50">Pilih
                        Paket</a>
                </div>
                <!-- Card 3 -->
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 p-8 flex flex-col relative overflow-hidden">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Corporate Full Day</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mb-6">Untuk seminar dan meeting perusahaan.</p>
                    <div class="text-3xl font-bold text-primary mb-6">Rp 15.000.000</div>
                    <ul class="space-y-3 mb-8 flex-1 text-sm text-slate-600 dark:text-slate-300">
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-green-500 text-base">check</span> Sewa Gedung 10 Jam</li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-green-500 text-base">check</span> Setup Classroom/Theater
                        </li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-green-500 text-base">check</span> Projector &amp; Screen</li>
                        <li class="flex items-center gap-2"><span
                                class="material-icons text-green-500 text-base">check</span> Coffee Break Area</li>
                    </ul>
                    <button
                        class="w-full py-3 rounded-lg border-2 border-primary text-primary font-semibold hover:bg-primary hover:text-white transition-colors">Pilih
                        Paket</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Form Section -->
    <section id="booking"
        class="py-20 md:py-28 bg-gradient-to-br from-slate-50 via-blue-50/30 to-slate-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 -left-20 w-72 h-72 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 -right-20 w-96 h-96 bg-blue-400/5 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary text-sm font-semibold mb-6">
                    <span class="material-icons text-base">edit_calendar</span>
                    Formulir Reservasi
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">
                    Wujudkan Acara <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-blue-600">Impian
                        Anda</span>
                </h2>
                <p class="text-lg text-slate-600 dark:text-slate-300">
                    Isi formulir di bawah dan tim kami akan segera menghubungi Anda untuk memastikan setiap detail acara
                    sempurna.
                </p>
            </div>

            <!-- Form Card -->
            <div class="max-w-5xl mx-auto">

                <!-- Calendar Section (Added) -->
                <div class="max-w-4xl mx-auto mb-10" id="calendar-container">
                    <div
                        class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                        <div class="p-6 bg-primary text-white flex justify-between items-center">
                            <h3 class="text-xl font-bold flex items-center gap-2">
                                <span class="material-icons">calendar_month</span>
                                Cek Ketersediaan
                            </h3>
                            <div class="flex items-center gap-4">
                                <button id="prev-month" class="hover:bg-white/20 p-1 rounded-full transition"><span
                                        class="material-icons">chevron_left</span></button>
                                <span id="month-year" class="font-bold text-lg"></span>
                                <button id="next-month" class="hover:bg-white/20 p-1 rounded-full transition"><span
                                        class="material-icons">chevron_right</span></button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div
                                class="grid grid-cols-7 gap-2 mb-2 text-center text-sm font-bold text-slate-500 dark:text-slate-400">
                                <div>Min</div>
                                <div>Sen</div>
                                <div>Sel</div>
                                <div>Rab</div>
                                <div>Kam</div>
                                <div>Jum</div>
                                <div>Sab</div>
                            </div>
                            <div id="calendar-days" class="calendar-grid">
                                <!-- Days generated by JS -->
                            </div>
                            <div class="mt-6 flex gap-4 text-sm justify-center">
                                <div class="flex items-center gap-2"><span
                                        class="w-3 h-3 rounded-full bg-slate-100 border border-slate-300"></span>
                                    Tersedia</div>
                                <div class="flex items-center gap-2"><span
                                        class="w-3 h-3 rounded-full bg-red-100 border border-red-300"></span> Penuh
                                </div>
                                <div class="flex items-center gap-2"><span
                                        class="w-3 h-3 rounded-full bg-primary"></span> Dipilih</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-slate-800 rounded-3xl shadow-2xl dark:shadow-slate-900/50 overflow-hidden border border-slate-100 dark:border-slate-700">
                    <!-- Form Header with Gradient -->
                    <div class="relative h-40 bg-gradient-to-r from-primary via-blue-600 to-primary overflow-hidden">
                        <div class="absolute inset-0 bg-black/10 pattern-grid-lg opacity-20"></div>
                        <!-- Animated background circles -->
                        <div
                            class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-white/10 blur-2xl animate-pulse">
                        </div>
                        <div class="absolute -bottom-10 -left-10 w-52 h-52 rounded-full bg-white/10 blur-3xl animate-pulse"
                            style="animation-delay: 1s;"></div>

                        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-8">
                            <span class="material-icons-outlined text-white text-5xl mb-3">event_available</span>
                            <h3 class="text-3xl font-bold text-white tracking-tight">Formulir Booking</h3>
                            <p class="text-blue-100 mt-2 text-sm font-medium">Lengkapi informasi Anda untuk reservasi
                                gedung</p>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <form class="p-8 md:p-12 space-y-10">
                        <!-- Section 1: Informasi Pemesan -->
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 pb-3 border-b-2 border-primary/20">
                                <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                                    <span class="material-icons-outlined text-primary text-xl">person_outline</span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-800 dark:text-slate-200">Informasi Pemesan</h3>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <!-- Nama Lengkap -->
                                <div class="group">
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                        for="fullName">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span
                                                class="material-icons-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">person</span>
                                        </div>
                                        <input
                                            class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 pl-12 pr-4 transition-all duration-200"
                                            id="fullName" name="fullName" placeholder="Masukkan nama lengkap Anda"
                                            type="text" required />
                                    </div>
                                </div>
                                <!-- Contact Grid -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- No HP -->
                                    <div class="group">
                                        <label
                                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                            for="phone">
                                            No. HP / WhatsApp <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <span
                                                    class="material-icons-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">smartphone</span>
                                            </div>
                                            <input
                                                class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 pl-12 pr-4 transition-all duration-200"
                                                id="phone" name="phone" placeholder="e.g. 081234567890" type="tel"
                                                required />
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="group">
                                        <label
                                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                            for="email">
                                            Alamat Email <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <span
                                                    class="material-icons-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">mail_outline</span>
                                            </div>
                                            <input
                                                class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 pl-12 pr-4 transition-all duration-200"
                                                id="email" name="email" placeholder="contoh@email.com" type="email"
                                                required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Detail Acara -->
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 pb-3 border-b-2 border-primary/20">
                                <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                                    <span class="material-icons-outlined text-primary text-xl">event_note</span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-800 dark:text-slate-200">Detail Acara</h3>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <!-- Nama Acara -->
                                <div class="group">
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                        for="eventName">
                                        Nama Acara <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span
                                                class="material-icons-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">stars</span>
                                        </div>
                                        <input
                                            class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 pl-12 pr-4 transition-all duration-200"
                                            id="eventName" name="eventName" placeholder="Misal: Pernikahan Rina & Andi"
                                            type="text" required />
                                    </div>
                                </div>

                                <!-- Pilih Paket -->
                                <div class="group">
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                        for="packageSelect">
                                        Pilih Paket <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span
                                                class="material-icons-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">card_giftcard</span>
                                        </div>
                                        <select
                                            class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 pl-12 pr-10 transition-all duration-200 appearance-none"
                                            id="packageSelect" name="packageSelect" required>
                                            <option value="">-- Pilih Paket Yang Sesuai --</option>
                                            <option value="basic-wedding">Basic Wedding - Rp 25.000.000</option>
                                            <option value="grand-wedding">Grand Wedding - Rp 45.000.000 (Terpopuler)
                                            </option>
                                            <option value="corporate-full-day">Corporate Full Day - Rp 15.000.000
                                            </option>
                                            <option value="custom">Paket Custom (Diskusi dengan Tim)</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                            <span class="material-icons text-slate-400">expand_more</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Date Grid -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Tanggal Mulai -->
                                    <div class="group">
                                        <label
                                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                            for="startDate">
                                            Tanggal Mulai <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <span
                                                    class="material-icons-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">calendar_today</span>
                                            </div>
                                            <input
                                                class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 pl-12 pr-4 transition-all duration-200"
                                                id="startDate" name="startDate" type="date" required />
                                        </div>
                                    </div>
                                    <!-- Tanggal Selesai -->
                                    <div class="group">
                                        <label
                                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                            for="endDate">
                                            Tanggal Selesai
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <span
                                                    class="material-icons-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">event</span>
                                            </div>
                                            <input
                                                class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 pl-12 pr-4 transition-all duration-200"
                                                id="endDate" name="endDate" type="date" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Time and Guest Count Grid -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Jam Acara -->
                                    <div class="group">
                                        <label
                                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                            for="eventTime">
                                            Jam Mulai Acara <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <span
                                                    class="material-icons-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">schedule</span>
                                            </div>
                                            <input
                                                class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 pl-12 pr-4 transition-all duration-200"
                                                id="eventTime" name="eventTime" type="time" required />
                                        </div>
                                    </div>
                                    <!-- Jumlah Tamu -->
                                    <div class="group">
                                        <label
                                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                            for="guestCount">
                                            Perkiraan Jumlah Tamu <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <span
                                                    class="material-icons-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">group</span>
                                            </div>
                                            <input
                                                class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 pl-12 pr-4 transition-all duration-200"
                                                id="guestCount" min="1" name="guestCount" placeholder="Misal: 500"
                                                type="number" required />
                                        </div>
                                    </div>
                                </div>

                                <!-- Catatan Tambahan -->
                                <div class="group">
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2"
                                        for="notes">
                                        Catatan atau Permintaan Khusus
                                    </label>
                                    <div class="relative">
                                        <textarea
                                            class="block w-full rounded-xl border-2 border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 text-base py-3.5 px-4 transition-all duration-200 min-h-[120px] resize-y"
                                            id="notes" name="notes"
                                            placeholder="Tuliskan kebutuhan khusus atau pertanyaan Anda di sini..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-primary rounded-lg p-6">
                            <div class="flex items-start gap-3">
                                <span class="material-icons text-primary text-2xl mt-0.5">info</span>
                                <div class="flex-1">
                                    <h4 class="font-bold text-slate-900 dark:text-white mb-2">Informasi Penting</h4>
                                    <ul class="text-sm text-slate-700 dark:text-slate-300 space-y-1">
                                        <li>• Tim kami akan menghubungi Anda dalam 1x24 jam setelah formulir dikirim
                                        </li>
                                        <li>• Konfirmasi booking memerlukan pembayaran DP 30%</li>
                                        <li>• Pastikan data yang Anda masukkan sudah benar</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-6">
                            <button
                                class="group relative w-full flex justify-center items-center gap-3 py-5 px-6 border-0 text-lg font-bold rounded-xl text-white bg-gradient-to-r from-primary to-blue-600 hover:from-primary-dark hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-primary/50 transition-all duration-300 shadow-xl shadow-primary/40 hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-0.5"
                                type="submit">
                                <span
                                    class="material-icons-outlined text-2xl group-hover:scale-110 transition-transform duration-300">send</span>
                                <span>Kirim Permintaan Reservasi</span>
                                <span
                                    class="material-icons text-xl group-hover:translate-x-1 transition-transform duration-300">arrow_forward</span>
                            </button>
                            <p class="text-center text-sm text-slate-500 dark:text-slate-400 mt-5">
                                Dengan mengirim formulir ini, Anda menyetujui <a
                                    class="text-primary hover:text-primary-dark font-semibold hover:underline transition-colors"
                                    href="#">Syarat &amp; Ketentuan</a> yang berlaku.
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Trust Badges -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                    <div
                        class="flex items-center gap-4 bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-md border border-slate-100 dark:border-slate-700">
                        <div
                            class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center flex-shrink-0">
                            <span
                                class="material-icons text-green-600 dark:text-green-400 text-2xl">verified_user</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 dark:text-white text-sm">100% Aman</h4>
                            <p class="text-xs text-slate-600 dark:text-slate-400">Data Anda terlindungi</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-4 bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-md border border-slate-100 dark:border-slate-700">
                        <div
                            class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center flex-shrink-0">
                            <span class="material-icons text-primary text-2xl">support_agent</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 dark:text-white text-sm">Respon Cepat</h4>
                            <p class="text-xs text-slate-600 dark:text-slate-400">Balasan dalam 1x24 jam</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-4 bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-md border border-slate-100 dark:border-slate-700">
                        <div
                            class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center flex-shrink-0">
                            <span class="material-icons text-purple-600 dark:text-purple-400 text-2xl">recommend</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 dark:text-white text-sm">Gratis Konsultasi</h4>
                            <p class="text-xs text-slate-600 dark:text-slate-400">Diskusi tanpa biaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div>
                    <div class="flex items-center gap-2 mb-6">
                        <div
                            class="w-8 h-8 rounded bg-primary flex items-center justify-center text-white font-bold text-xl">
                            G</div>
                        <span class="font-bold text-xl text-white">GrandHall.</span>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-400 mb-6">
                        Platform penyewaan gedung serbaguna terdepan. Kami mengutamakan kualitas, kenyamanan, dan
                        kepuasan pelanggan dalam setiap acara.
                    </p>
                    <div class="flex gap-4">
                        <a class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-colors"
                            href="#"><i class="material-icons text-sm">facebook</i></a>
                        <a class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-colors"
                            href="#"><i class="material-icons text-sm">photo_camera</i></a>
                        <a class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-colors"
                            href="#"><i class="material-icons text-sm">email</i></a>
                    </div>
                </div>
                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Menu Cepat</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a class="hover:text-primary transition-colors" href="#">Beranda</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#about">Tentang Kami</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#facilities">Fasilitas</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#gallery">Galeri Foto</a></li>
                    </ul>
                </div>
                <!-- Contact -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Hubungi Kami</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start gap-3">
                            <span class="material-icons text-primary text-base mt-0.5">location_on</span>
                            <span>Jl. Sudirman No. 123, Jakarta Selatan, DKI Jakarta 12190</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-icons text-primary text-base">phone</span>
                            <span>(021) 7890-1234</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-icons text-primary text-base">email</span>
                            <span>info@grandhall.id</span>
                        </li>
                    </ul>
                </div>
                <!-- Newsletter -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Newsletter</h4>
                    <p class="text-sm text-slate-400 mb-4">Dapatkan info promo dan update terbaru dari kami.</p>
                    <form class="space-y-3">
                        <input
                            class="w-full rounded bg-slate-800 border-slate-700 text-white placeholder-slate-500 focus:border-primary focus:ring-primary text-sm py-2 px-3"
                            placeholder="Email Anda" type="email" />
                        <button
                            class="w-full bg-primary hover:bg-blue-600 text-white font-medium py-2 rounded transition-colors text-sm">Langganan</button>
                    </form>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500">© 2024 GrandHall. All rights reserved.</p>
                <div class="flex gap-6 text-sm text-slate-500">
                    <a class="hover:text-white" href="#">Privacy Policy</a>
                    <a class="hover:text-white" href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Chatbot Floating Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <button id="chat-toggle"
            class="bg-primary hover:bg-primary-dark text-white p-4 rounded-full shadow-lg shadow-primary/40 transition-transform hover:scale-110 flex items-center justify-center">
            <span class="material-icons text-2xl">chat_bubble</span>
        </button>
    </div>

    <!-- Chat Window -->
    <div id="chat-window"
        class="fixed bottom-24 right-6 z-50 w-80 md:w-96 bg-white dark:bg-slate-800 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 hidden opacity-0 transform scale-0 origin-bottom-right transition-all duration-300">
        <div class="bg-primary p-4 rounded-t-2xl flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                    <span class="material-icons text-white text-sm">smart_toy</span>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm">Asisten GrandHall</h4>
                    <p class="text-blue-100 text-xs">Online</p>
                </div>
            </div>
            <button id="close-chat" class="text-white/80 hover:text-white"><span
                    class="material-icons">close</span></button>
        </div>
        <div class="p-4 h-80 overflow-y-auto bg-slate-50 dark:bg-slate-900/50 space-y-4">
            <div class="chat-message bot shadow-sm">
                Halo! Ada yang bisa saya bantu mengenai penyewaan gedung? 👋
            </div>
            <!-- Chat bubbles will be appended here -->
        </div>
        <div class="p-3 border-t border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 rounded-b-2xl">
            <form class="flex gap-2" onsubmit="event.preventDefault();">
                <input type="text" placeholder="Ketik pesan..."
                    class="flex-1 rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-sm focus:ring-primary focus:border-primary">
                <button type="submit"
                    class="bg-primary hover:bg-primary-dark text-white p-2 rounded-lg transition-colors">
                    <span class="material-icons text-sm">send</span>
                </button>
            </form>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>