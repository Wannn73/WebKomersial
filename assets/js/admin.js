/**
 * Admin Dashboard Script
 * Handles Login simulation, Calendar Management
 */

document.addEventListener('DOMContentLoaded', function () {
    // --- Elements ---
    const loginSection = document.getElementById('login-section');
    const dashboardSection = document.getElementById('dashboard-section');
    const loginForm = document.getElementById('login-form');
    const logoutBtn = document.getElementById('logout-btn');
    const calendarDays = document.getElementById('admin-calendar-days');
    const monthYear = document.getElementById('month-year-admin');
    const prevBtn = document.getElementById('prev-month-admin');
    const nextBtn = document.getElementById('next-month-admin');

    // --- State ---
    // Mock Data (Shared concept with front-end)
    let bookedDates = [
        '2026-02-14',
        '2026-02-15',
        '2026-02-20',
        '2026-02-28',
        '2026-03-05'
    ];

    // Mock Public Holidays (Contoh Tanggal Merah Manual)
    const holidays = [
        '2026-01-01', // Tahun Baru
        '2026-02-17', // Imlek (Contoh)
        '2026-03-11', // Nyepi (Contoh)
        '2026-03-31', // Idul Fitri (Contoh)
        '2026-08-17'  // Kemerdekaan
    ];

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    // --- Login Logic (Simulation) ---
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Mock Credentials
            if (username === 'admin' && password === 'admin') { // Simplified for demo
                loginSection.classList.add('hidden');
                dashboardSection.classList.remove('hidden');
                renderAdminCalendar(currentMonth, currentYear);
            } else {
                alert('Username atau password salah! (Coba: admin / admin)');
            }
        });
    }

    if (logoutBtn) {
        logoutBtn.addEventListener('click', function () {
            dashboardSection.classList.add('hidden');
            loginSection.classList.remove('hidden');
        });
    }

    // --- Calendar Logic ---
    function renderAdminCalendar(month, year) {
        if (!calendarDays) return;

        calendarDays.innerHTML = '';
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        monthYear.innerText = `${monthNames[month]} ${year}`;

        // Empty cells
        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.classList.add('calendar-day', 'empty');
            calendarDays.appendChild(emptyCell);
        }

        // Days
        for (let i = 1; i <= daysInMonth; i++) {
            const dayCell = document.createElement('div');
            dayCell.innerText = i;
            dayCell.classList.add('calendar-day');

            const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
            const dayOfWeek = new Date(year, month, i).getDay(); // 0 = Sunday

            // Check for Holiday (Sunday or in list)
            if (dayOfWeek === 0 || holidays.includes(dateString)) {
                dayCell.classList.add('holiday');
            }

            // Render Status
            if (bookedDates.includes(dateString)) {
                dayCell.classList.add('booked');
                dayCell.classList.remove('holiday'); // Gray overrides red
                dayCell.title = "Klik untuk hapus booking";
            } else {
                dayCell.title = "Klik untuk blokir tanggal (Booking Manual)";
            }

            // Click Handler (Toggle Status)
            dayCell.addEventListener('click', () => {
                if (bookedDates.includes(dateString)) {
                    // Remove
                    bookedDates = bookedDates.filter(d => d !== dateString);
                    dayCell.classList.remove('booked');
                    // alert(`Booking tanggal ${dateString} dihapus.`);
                } else {
                    // Add
                    bookedDates.push(dateString);
                    dayCell.classList.add('booked');
                    // alert(`Tanggal ${dateString} diblokir manual.`);
                }
                // In real app: Send AJAX request to update DB here
            });

            calendarDays.appendChild(dayCell);
        }
    }

    // Navigation
    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) { currentMonth = 11; currentYear--; }
            renderAdminCalendar(currentMonth, currentYear);
        });

        nextBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) { currentMonth = 0; currentYear++; }
            renderAdminCalendar(currentMonth, currentYear);
        });
    }
});
