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
    class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-100 font-display selection:bg-primary/20 overflow-x-hidden">

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
                    <button id="mobile-menu-button"
                        class="text-slate-500 hover:text-slate-700 dark:text-slate-400 focus:outline-none">
                        <span class="material-icons">menu</span>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 dark:border-slate-700">
                <div class="px-2 pt-4 pb-6 space-y-3">
                    <a class="block px-4 py-2.5 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-primary rounded-lg font-medium transition-colors"
                        href="#">Beranda</a>
                    <a class="block px-4 py-2.5 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-primary rounded-lg font-medium transition-colors"
                        href="#about">Tentang Kami</a>
                    <a class="block px-4 py-2.5 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-primary rounded-lg font-medium transition-colors"
                        href="#facilities">Fasilitas</a>
                    <a class="block px-4 py-2.5 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-primary rounded-lg font-medium transition-colors"
                        href="#gallery">Galeri</a>
                    <div class="pt-2">
                        <a class="block w-full bg-primary hover:bg-primary-dark text-white px-4 py-2.5 rounded-lg font-medium shadow-lg shadow-primary/30 transition-all text-center"
                            href="#booking">
                            Booking Sekarang
                        </a>
                    </div>
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
                        class="absolute -bottom-6 right-0 md:-right-6 bg-white dark:bg-slate-800 p-4 md:p-6 rounded-xl shadow-xl border border-slate-100 dark:border-slate-700 max-w-[280px] md:max-w-xs">
                        <div class="flex items-center gap-3 md:gap-4">
                            <div
                                class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-icons text-xl md:text-2xl">verified</span>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900 dark:text-white text-base md:text-lg">Terpercaya</p>
                                <p class="text-xs md:text-sm text-slate-500">Pilihan utama event organizer profesional.
                                </p>
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
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
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

    <!-- Pricing Section Removed -->

    <!-- Booking Form Section -->
    <section id="booking"
        class="py-20 md:py-28 bg-gradient-to-br from-slate-50 via-blue-50/30 to-slate-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
        <!-- CTA Section Removed (Map moved to footer) -->
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

            <!-- Unified Booking Card -->
            <div
                class="max-w-6xl mx-auto bg-white dark:bg-slate-800 rounded-3xl shadow-2xl overflow-hidden border border-slate-200 dark:border-slate-700 flex flex-col lg:flex-row h-auto lg:h-[650px]">

                <!-- Left Side: Dark Calendar & Quote -->
                <div
                    class="w-full lg:w-1/3 bg-slate-900 p-6 lg:p-8 text-white flex flex-col h-full relative overflow-hidden">
                    <!-- Bg Decoration -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-blue-500/20 rounded-full blur-3xl"></div>

                    <!-- Centered Calendar Container -->
                    <div class="relative z-10 flex flex-col items-center justify-center flex-1 w-full max-w-sm mx-auto">
                        <div class="w-full mb-6 flex justify-between items-center">
                            <h3 class="text-xl font-bold" id="month-year">Februari 2026</h3>
                            <div class="flex gap-2">
                                <button id="prev-month" class="p-1 hover:bg-white/10 rounded-full transition"><span
                                        class="material-icons text-sm">chevron_left</span></button>
                                <button id="next-month" class="p-1 hover:bg-white/10 rounded-full transition"><span
                                        class="material-icons text-sm">chevron_right</span></button>
                            </div>
                        </div>

                        <!-- Calendar Grid -->
                        <div
                            class="w-full mb-2 grid grid-cols-7 gap-1 text-center text-xs font-semibold text-slate-500">
                            <div>M</div>
                            <div>S</div>
                            <div>S</div>
                            <div>R</div>
                            <div>K</div>
                            <div>J</div>
                            <div>S</div>
                        </div>
                        <div id="calendar-days" class="calendar-grid text-sm mb-6 w-full">
                            <!-- JS Generated -->
                        </div>

                        <!-- Legend -->
                        <div class="w-full space-y-3 text-xs text-slate-300">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-primary"></span> Tanggal Pilihan
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-slate-400"></span> Sudah Dipesan
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-slate-700 border border-slate-600"></span> Tersedia
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Multi-step Form -->
                <div class="w-full lg:w-2/3 p-6 lg:p-10 relative flex flex-col h-full">

                    <!-- Stepper -->
                    <div class="flex justify-between items-center mb-8 relative">
                        <div class="absolute top-1/2 left-0 w-full h-0.5 bg-slate-100 dark:bg-slate-700 -z-0"></div>

                        <!-- Step 1 Indicator -->
                        <div class="flex flex-col items-center gap-2 relative z-10">
                            <div class="step-indicator active w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm shadow-lg shadow-primary/30"
                                data-step="1">1</div>
                            <span class="text-xs font-semibold text-slate-600 dark:text-slate-400">Jadwal</span>
                        </div>

                        <!-- Step 2 Indicator -->
                        <div class="flex flex-col items-center gap-2 relative z-10">
                            <div class="step-indicator w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold text-sm"
                                data-step="2">2</div>
                            <span class="text-xs font-semibold text-slate-400">Detail</span>
                        </div>

                        <!-- Step 3 Indicator -->
                        <div class="flex flex-col items-center gap-2 relative z-10">
                            <div class="step-indicator w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold text-sm"
                                data-step="3">3</div>
                            <span class="text-xs font-semibold text-slate-400">Selesai</span>
                        </div>
                    </div>

                    <!-- Form Container -->
                    <form id="booking-form" class="flex-1 flex flex-col justify-between">

                        <!-- Step 1: Schedule -->
                        <div class="form-step" data-step="1">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4">Detail Acara</h3>
                            <div class="space-y-4">
                                <!-- Nama Acara (Full Width) -->
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Nama
                                        Acara</label>
                                    <input type="text" name="eventName" id="eventName"
                                        class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3.5 text-slate-900 dark:text-white focus:ring-primary focus:border-primary font-medium"
                                        placeholder="Contoh: Turnament Esport" required>
                                    <p class="text-xs text-red-500 mt-1 hidden" id="error-eventName">Nama acara harus
                                        diisi</p>
                                </div>

                                <!-- Tanggal Mulai (Full Width) -->
                                <div>
                                    <label
                                        class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Tanggal
                                        Mulai</label>
                                    <input type="text" id="displayDate"
                                        class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3.5 text-slate-500 cursor-not-allowed font-medium"
                                        placeholder="Pilih di kalender" readonly>
                                    <input type="hidden" id="startDate" name="startDate" required>
                                    <p class="text-xs text-red-500 mt-1 hidden" id="error-startDate">Silakan pilih
                                        tanggal di kalender</p>
                                </div>

                                <!-- Durasi & Estimasi Tamu Row -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Durasi (Left) -->
                                    <div>
                                        <label
                                            class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Durasi
                                            (Hari)</label>
                                        <input type="number" name="duration" id="duration" min="1" max="30" value="1"
                                            class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3.5 text-slate-900 dark:text-white focus:ring-primary focus:border-primary font-medium"
                                            placeholder="1" required>
                                        <p class="text-xs text-slate-500 mt-1 italic" id="endDateText"></p>
                                        <p class="text-xs text-red-500 mt-1 hidden" id="error-duration">Durasi harus
                                            antara 1-30 hari</p>
                                    </div>

                                    <!-- Estimasi Tamu (Right) -->
                                    <div>
                                        <label
                                            class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Estimasi
                                            Tamu</label>
                                        <input type="number" id="guestCount" name="guestCount"
                                            class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3.5 text-slate-900 dark:text-white focus:ring-primary focus:border-primary font-medium"
                                            placeholder="500" required>
                                        <p class="text-xs text-red-500 mt-1 hidden" id="error-guestCount">Jumlah tamu
                                            harus diisi</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Details (Sesuai Gambar 1.png) -->
                        <div class="form-step hidden" data-step="2">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-6">Data Pemesan</h3>
                            <p class="text-slate-500 text-sm mb-6">Lengkapi informasi kontak Anda untuk melanjutkan
                                pemesanan venue.</p>

                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama
                                        Lengkap</label>
                                    <input type="text" name="fullName" id="fullName"
                                        class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3.5 focus:ring-primary font-medium"
                                        placeholder="Contoh: John Doe" required>
                                    <p class="text-xs text-red-500 mt-1 hidden" id="error-fullName">Nama lengkap harus
                                        diisi</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">No.
                                        WhatsApp</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-3.5 text-slate-500 font-bold">+62</span>
                                        <input type="tel" name="phone" id="phone"
                                            class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl pl-14 pr-4 py-3.5 font-medium"
                                            placeholder="812xxxxxxx" pattern="[0-9]*" inputmode="numeric" maxlength="13"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.startsWith('0')) this.value = this.value.substring(1)"
                                            required>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-1">Langsung masukkan nomor (tanpa 0 di depan).
                                    </p>
                                    <p class="text-xs text-red-500 mt-1 hidden" id="error-phone">Nomor WhatsApp harus
                                        9-13 digit</p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3.5 font-medium"
                                        placeholder="nama@email.com" required>
                                    <p class="text-xs text-red-500 mt-1 hidden" id="error-email">Format email tidak
                                        valid</p>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Review (Sesuai Gambar 1.png - Kanan) -->
                        <div class="form-step hidden" data-step="3">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-6">Konfirmasi Data</h3>

                            <div
                                class="bg-slate-50 dark:bg-slate-700/30 rounded-xl p-6 text-sm space-y-4 mb-6 border border-slate-100 dark:border-slate-700/50">
                                <div
                                    class="flex justify-between items-center border-b border-slate-200 dark:border-slate-700 pb-3">
                                    <span class="text-slate-500 font-medium">Acara</span>
                                    <span class="font-bold text-slate-900 dark:text-white text-base text-right"
                                        id="summary-event">-</span>
                                </div>
                                <div
                                    class="flex justify-between items-center border-b border-slate-200 dark:border-slate-700 pb-3">
                                    <span class="text-slate-500 font-medium">Tanggal & Waktu</span>
                                    <div class="text-right">
                                        <div class="font-bold text-slate-900 dark:text-white text-base"
                                            id="summary-date">-</div>
                                        <div class="text-xs text-slate-500" id="summary-time">-</div>
                                    </div>
                                </div>
                                <div
                                    class="flex justify-between items-center border-b border-slate-200 dark:border-slate-700 pb-3">
                                    <span class="text-slate-500 font-medium">Durasi</span>
                                    <span class="font-bold text-slate-900 dark:text-white text-base"
                                        id="summary-duration">-</span>
                                </div>
                                <div
                                    class="flex justify-between items-center border-b border-slate-200 dark:border-slate-700 pb-3">
                                    <span class="text-slate-500 font-medium">Estimasi Tamu</span>
                                    <span class="font-bold text-slate-900 dark:text-white text-base"
                                        id="summary-guests">-</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-slate-500 font-medium">Pemesan</span>
                                    <span class="font-bold text-slate-900 dark:text-white text-base"
                                        id="summary-name">-</span>
                                </div>
                            </div>
                        </div>


                        <!-- Controls -->
                        <div class="mt-auto pt-6 flex flex-col-reverse md:flex-row justify-between items-center gap-4">
                            <button type="button" id="prevBtn"
                                class="w-full md:w-auto flex items-center justify-center gap-2 text-slate-500 hover:text-slate-700 dark:text-slate-400 font-semibold transition hidden py-3">
                                <span class="material-icons text-base">arrow_back</span> Kembali
                            </button>

                            <button type="button" id="nextBtn"
                                class="w-full md:w-auto ml-auto px-8 py-3 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 shadow-lg shadow-blue-600/30 transition flex items-center justify-center gap-2">
                                Review <span class="material-icons text-sm">arrow_forward</span>
                            </button>

                            <button type="submit" id="submitBtn"
                                class="w-full md:w-auto ml-auto px-8 py-3 rounded-xl bg-green-500 text-white font-bold hover:bg-green-600 shadow-lg shadow-green-500/30 transition flex items-center justify-center gap-2 hidden">
                                Kirim Pesan <span class="material-icons text-sm">whatsapp</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div> <!-- Trust Badges -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div
                    class="flex items-center gap-4 bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-md border border-slate-100 dark:border-slate-700">
                    <div
                        class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center flex-shrink-0">
                        <span class="material-icons text-green-600 dark:text-green-400 text-2xl">verified_user</span>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 mb-12">
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
                <!-- Lokasi -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Lokasi</h4>
                    <!-- Mini Map -->
                    <div
                        class="rounded-xl overflow-hidden border border-slate-700 h-32 bg-slate-800 relative group">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.298927948332!2d106.80003031476915!3d-6.224250995493032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14d84421119%3A0x66f6fbe026b21585!2sJl.%20Jend.%20Sudirman%20No.123%2C%20RT.10%2FRW.11%2C%20Karet%20Tengsin%2C%20Kecamatan%20Tanah%20Abang%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2010220!5e0!3m2!1sid!2sid!4v1645498263123!5m2!1sid!2sid"
                            class="w-full h-full absolute inset-0 opacity-80 group-hover:opacity-100 transition duration-500"
                            style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                        <div
                            class="absolute bottom-2 left-2 bg-slate-900/80 backdrop-blur-sm px-3 py-1 rounded-lg border border-slate-700">
                            <span class="text-xs text-white font-medium flex items-center gap-1">
                                <i class="material-icons text-[10px] text-red-500">place</i> Lihat di Google Maps
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Kontak Cepat -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Kontak Cepat</h4>
                    <p class="text-slate-400 text-sm mb-4">
                        Butuh respon cepat? Hubungi kami langsung melalui WhatsApp.
                    </p>
                    <a href="https://wa.me/6285261767139" target="_blank"
                        class="flex items-center gap-3 w-full bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-xl transition-all shadow-lg shadow-green-900/20 group">
                        <div
                            class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center group-hover:scale-110 transition">
                            <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <span class="font-semibold block">Chat WhatsApp</span>
                            <span class="text-xs text-green-100">085261767139</span>
                        </div>
                    </a>
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
        <div id="chat-messages" class="p-4 h-80 overflow-y-auto bg-slate-50 dark:bg-slate-900/50 space-y-4">
            <div class="chat-message bot shadow-sm">
                Halo! Ada yang bisa saya bantu mengenai penyewaan gedung? 👋
            </div>
            <!-- Chat bubbles will be appended here -->
        </div>
        <div class="p-3 border-t border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 rounded-b-2xl">
            <form id="chat-form" class="flex gap-2">
                <input type="text" id="chat-input" placeholder="Ketik pesan..."
                    class="flex-1 rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-sm focus:ring-primary focus:border-primary">
                <button type="submit" id="chat-send"
                    class="bg-primary hover:bg-primary-dark text-white p-2 rounded-lg transition-colors">
                    <span class="material-icons text-sm">send</span>
                </button>
            </form>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>