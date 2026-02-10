/**
 * Web Komersial Main Script
 * Handles Calendar, Booking Logic, and Chatbot
 */

document.addEventListener('DOMContentLoaded', function () {
    // === Variables ===
    const calendarDays = document.getElementById('calendar-days');
    const monthYear = document.getElementById('month-year');
    const prevMonthBtn = document.getElementById('prev-month');
    const nextMonthBtn = document.getElementById('next-month');
    const bookingForm = document.querySelector('form');

    // Mock Data for Booked Dates (Format: YYYY-MM-DD)
    // Normally this would come from a database fetch
    const bookedDates = [
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

    // === Calendar Functions ===
    function renderCalendar(month, year) {
        if (!calendarDays) return; // Guard clause if calendar element missing

        calendarDays.innerHTML = '';
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Month Names
        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        monthYear.innerText = `${monthNames[month]} ${year}`;

        // Empty cells for days before the first day of the month
        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.classList.add('calendar-day', 'empty');
            calendarDays.appendChild(emptyCell);
        }

        // Days rendering
        for (let i = 1; i <= daysInMonth; i++) {
            const dayCell = document.createElement('div');
            dayCell.innerText = i;
            dayCell.classList.add('calendar-day');

            // Format date string YYYY-MM-DD to check against bookedDates
            const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
            const dayOfWeek = new Date(year, month, i).getDay(); // 0 = Sunday

            // Check for Holiday (Sunday or in list)
            // Note: In Indonesia, Sunday is always red
            if (dayOfWeek === 0 || holidays.includes(dateString)) {
                dayCell.classList.add('holiday');
            }

            // Check if today
            const today = new Date();
            if (i === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                dayCell.classList.add('today');
            }

            // Check if booked
            if (bookedDates.includes(dateString)) {
                dayCell.classList.add('booked');
                dayCell.title = "Sudah Dipesan";
                // Remove holiday class visually if booked (gray overrides red)
                dayCell.classList.remove('holiday');
            } else {
                // Click event to select date for booking
                dayCell.addEventListener('click', () => {
                    document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
                    dayCell.classList.add('selected');

                    // Auto-fill the date input in the form
                    const dateInput = document.getElementById('startDate');
                    if (dateInput) {
                        dateInput.value = dateString;
                        // Smooth scroll to form if needed
                        // dateInput.scrollIntoView({behavior: 'smooth', block: 'center'});
                    }
                });
            }

            calendarDays.appendChild(dayCell);
        }
    }

    if (prevMonthBtn && nextMonthBtn) {
        prevMonthBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar(currentMonth, currentYear);
        });

        nextMonthBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar(currentMonth, currentYear);
        });
    }

    // Initialize Calendar
    renderCalendar(currentMonth, currentYear);


    // === Booking Form Logic ===
    if (bookingForm) {
        // Set Min Date to Today
        const startDateInput = document.getElementById('startDate');
        if (startDateInput) {
            startDateInput.min = new Date().toISOString().split("T")[0];
        }

        bookingForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Simple Validation
            const formData = new FormData(bookingForm);
            const data = Object.fromEntries(formData.entries());

            // Check if date is booked
            if (bookedDates.includes(data.startDate)) {
                alert("Maaf, tanggal yang Anda pilih sudah penuh. Silakan pilih tanggal lain.");
                return;
            }

            // Show Confirmation Modal
            showConfirmationModal(data);
        });
    }

    function showConfirmationModal(data) {
        // Create Modal Element dynamically
        const modalHtml = `
            <div id="confirmModal" class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm animate-fade-in">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-2xl max-w-md w-full overflow-hidden border border-slate-100 dark:border-slate-700">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4">Konfirmasi Reservasi</h3>
                        <div class="space-y-3 text-sm text-slate-600 dark:text-slate-300">
                            <p><span class="font-semibold text-slate-900 dark:text-white">Nama:</span> ${data.fullName}</p>
                            <p><span class="font-semibold text-slate-900 dark:text-white">Acara:</span> ${data.eventName}</p>
                            <p><span class="font-semibold text-slate-900 dark:text-white">Tanggal:</span> ${data.startDate}</p>
                            <p><span class="font-semibold text-slate-900 dark:text-white">Paket:</span> ${data.packageSelect}</p>
                             <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg mt-4 text-xs">
                                <p class="text-primary font-medium">Langkah Selanjutnya:</p>
                                <p>Sistem akan mengarahkan Anda ke WhatsApp Admin untuk finalisasi pembayaran DP.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 mt-8">
                            <button id="cancelBtn" class="flex-1 px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 transition">Batal</button>
                            <button id="confirmBtn" class="flex-1 px-4 py-2 rounded-lg bg-primary text-white font-bold hover:bg-primary-dark transition shadow-lg shadow-primary/30">Ya, Lanjutkan ke WA</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', modalHtml);

        document.getElementById('cancelBtn').addEventListener('click', () => {
            document.getElementById('confirmModal').remove();
        });

        document.getElementById('confirmBtn').addEventListener('click', () => {
            redirectToWhatsApp(data);
            document.getElementById('confirmModal').remove();

            // Simulate Database Submission (Console Log)
            console.log("Saving to DB (Pending status)...", data);

            // Optionally reset form
            bookingForm.reset();
        });
    }

    function redirectToWhatsApp(data) {
        const adminPhone = "6281234567890"; // Ganti dengan nomor Admin
        const text = `Halo Admin GrandHall, saya ingin konfirmasi booking gedung:%0A%0A` +
            `Nama: ${data.fullName}%0A` +
            `Acara: ${data.eventName}%0A` +
            `Tanggal: ${data.startDate}%0A` +
            `Paket: ${data.packageSelect}%0A%0A` +
            `Mohon infonya untuk pembayaran DP. Terima kasih!`;

        window.open(`https://wa.me/${adminPhone}?text=${text}`, '_blank');
    }

    // === Chatbot Logic ===
    // Simple toggle for now, can be expanded
    const chatBtn = document.getElementById('chat-toggle');
    const chatWindow = document.getElementById('chat-window');
    const closeChat = document.getElementById('close-chat');

    if (chatBtn && chatWindow) {
        chatBtn.addEventListener('click', () => {
            chatWindow.classList.toggle('hidden');
            chatWindow.classList.toggle('scale-0');
            chatWindow.classList.toggle('opacity-0');

            // Reset animation classes for clean toggle
            if (!chatWindow.classList.contains('hidden')) {
                chatWindow.classList.remove('scale-0', 'opacity-0');
            }
        });

        closeChat.addEventListener('click', () => {
            chatWindow.classList.add('hidden');
        });
    }
});
