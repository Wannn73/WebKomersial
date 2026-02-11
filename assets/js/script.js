/**
 * Web Komersial Main Script
 * Handles Unified Calendar, Wizard Form, and Chatbot
 */

document.addEventListener('DOMContentLoaded', function () {
    // === Variables ===
    const calendarDays = document.getElementById('calendar-days');
    const monthYear = document.getElementById('month-year');
    const prevMonthBtn = document.getElementById('prev-month');
    const nextMonthBtn = document.getElementById('next-month');
    const displayDate = document.getElementById('displayDate');
    const startDateInput = document.getElementById('startDate');

    // Form Wizard Elements
    const formSteps = document.querySelectorAll('.form-step');
    const stepIndicators = document.querySelectorAll('.step-indicator');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const bookingForm = document.getElementById('booking-form');

    let currentStep = 1;

    // Mobile Menu Elements
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    // Dynamic Data (loaded from API)
    let bookedDates = [];

    // Mock Holidays (can be moved to database later if needed)
    const holidays = [
        '2026-01-01',
        '2026-08-17'
    ];

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    // === Fetch Booked Dates from API ===
    async function fetchBookedDates(month = null, year = null) {
        try {
            let url = 'api/check-availability.php';
            if (month && year) {
                url += `?month=${month}&year=${year}`;
            }

            const response = await fetch(url);
            const result = await response.json();

            if (result.success) {
                bookedDates = result.data.booked_dates || [];
                return bookedDates;
            } else {
                console.error('Failed to fetch booked dates:', result.message);
                return [];
            }
        } catch (error) {
            console.error('Error fetching booked dates:', error);
            return [];
        }
    }

    // === Calendar Functions ===
    function renderCalendar(month, year) {
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

        // Days rendering
        for (let i = 1; i <= daysInMonth; i++) {
            const dayCell = document.createElement('div');
            dayCell.innerText = i;
            dayCell.classList.add('calendar-day');

            const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
            const dayOfWeek = new Date(year, month, i).getDay(); // 0 = Sunday

            // Holiday check
            if (dayOfWeek === 0 || holidays.includes(dateString)) {
                dayCell.classList.add('holiday');
            }

            // Booked & Selection Logic
            if (bookedDates.includes(dateString)) {
                dayCell.classList.add('booked');
                dayCell.title = "Sudah Dipesan";
                dayCell.classList.remove('holiday');
                dayCell.style.pointerEvents = 'none'; // Disable click
            } else {
                dayCell.addEventListener('click', () => {
                    selectDate(dateString, dayCell, i, month, year);
                });
            }

            // Highlight selected logic
            if (startDateInput.value === dateString) {
                dayCell.classList.add('selected');
            }

            calendarDays.appendChild(dayCell);
        }
    }

    function selectDate(dateString, cell, day, month, year) {
        // Validation: Cannot select past dates
        const selected = new Date(dateString);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        if (selected < today) {
            alert("Tidak dapat memilih tanggal yang sudah lewat.");
            return;
        }

        // Visual update
        document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
        cell.classList.add('selected');

        // Input update
        startDateInput.value = dateString;

        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        displayDate.value = `${day} ${monthNames[month]} ${year}`;

        // Trigger duration change to update end date text if implementing that
        updateEndDateInfo();
    }

    // Helper to calculate and show end date
    function updateEndDateInfo() {
        const start = startDateInput.value;
        const durationLine = document.getElementById('duration').value;

        if (!start || !durationLine) return;

        let daysToAdd = parseInt(durationLine) - 1;
        if (isNaN(daysToAdd) || daysToAdd < 0) daysToAdd = 0;

        const dateObj = new Date(start);
        dateObj.setDate(dateObj.getDate() + daysToAdd);

        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        const formattedEndDate = `${dateObj.getDate()} ${monthNames[dateObj.getMonth()]} ${dateObj.getFullYear()}`;

        const endDateEl = document.getElementById('endDateText');
        if (endDateEl) {
            endDateEl.innerText = `Acara selesai tanggal: ${formattedEndDate}`;
            endDateEl.classList.remove('hidden');
        }
    }

    // Real-time validation helpers
    const durationInput = document.getElementById('duration');
    if (durationInput) {
        durationInput.addEventListener('input', updateEndDateInfo);
        durationInput.addEventListener('change', updateEndDateInfo);

        // Clear error on valid input
        durationInput.addEventListener('input', function () {
            const val = parseInt(this.value);
            const errorEl = document.getElementById('error-duration');
            if (val >= 1 && val <= 30) {
                if (errorEl) errorEl.classList.add('hidden');
                this.classList.remove('border-red-500', 'ring-1', 'ring-red-500');
            }
        });
    }

    // Clear errors on input for all fields
    const allInputs = document.querySelectorAll('input[id]');
    allInputs.forEach(input => {
        input.addEventListener('input', function () {
            const errorEl = document.getElementById(`error-${this.id}`);
            if (errorEl && this.value.trim()) {
                errorEl.classList.add('hidden');
                this.classList.remove('border-red-500', 'ring-1', 'ring-red-500');
            }
        });
    });


    if (prevMonthBtn && nextMonthBtn) {
        prevMonthBtn.addEventListener('click', async () => {
            currentMonth--;
            if (currentMonth < 0) { currentMonth = 11; currentYear--; }
            await fetchBookedDates(currentMonth + 1, currentYear);
            renderCalendar(currentMonth, currentYear);
        });

        nextMonthBtn.addEventListener('click', async () => {
            currentMonth++;
            if (currentMonth > 11) { currentMonth = 0; currentYear++; }
            await fetchBookedDates(currentMonth + 1, currentYear);
            renderCalendar(currentMonth, currentYear);
        });
    }

    // Initialize Calendar with API data
    async function initCalendar() {
        await fetchBookedDates(currentMonth + 1, currentYear);
        renderCalendar(currentMonth, currentYear);
    }

    initCalendar();


    // === Wizard Form Logic ===
    function updateWizardState() {
        // Show/Hide Steps
        formSteps.forEach(step => {
            if (parseInt(step.dataset.step) === currentStep) {
                step.classList.remove('hidden');
            } else {
                step.classList.add('hidden');
            }
        });

        // Update Indicators
        stepIndicators.forEach(ind => {
            const stepNum = parseInt(ind.dataset.step);
            if (stepNum <= currentStep) {
                ind.classList.add('active', 'bg-primary', 'text-white');
                ind.classList.remove('bg-slate-200', 'text-slate-500', 'dark:bg-slate-700');
            } else {
                ind.classList.remove('active', 'bg-primary', 'text-white');
                ind.classList.add('bg-slate-200', 'text-slate-500', 'dark:bg-slate-700');
            }
        });

        // Buttons
        if (currentStep === 1) {
            prevBtn.classList.add('hidden');
            nextBtn.classList.remove('hidden');
            submitBtn.classList.add('hidden');
        } else if (currentStep === 2) {
            prevBtn.classList.remove('hidden');
            nextBtn.classList.remove('hidden');
            submitBtn.classList.add('hidden');
        } else if (currentStep === 3) {
            prevBtn.classList.remove('hidden');
            nextBtn.classList.add('hidden');
            submitBtn.classList.remove('hidden');

            // Populate Summary
            document.getElementById('summary-date').innerText = displayDate.value || '-';
            document.getElementById('summary-event').innerText = document.getElementById('eventName').value || '-';

            // Format Time Display
            document.getElementById('summary-time').innerText = 'Full Day';

            const durationVal = document.getElementById('duration').value;
            document.getElementById('summary-duration').innerText = durationVal ? `${durationVal} Hari` : '-';
            document.getElementById('summary-guests').innerText = document.getElementById('guestCount').value || '-';
            document.getElementById('summary-name').innerText = document.getElementById('fullName').value || '-';
        }
    }

    function validateStep(step) {
        let isValid = true;

        // Helper function to show error
        function showError(fieldId, message) {
            const errorEl = document.getElementById(`error-${fieldId}`);
            const inputEl = document.getElementById(fieldId);
            if (errorEl) {
                errorEl.classList.remove('hidden');
                if (message) errorEl.innerText = message;
            }
            if (inputEl) {
                inputEl.classList.add('border-red-500', 'ring-1', 'ring-red-500');
            }
            isValid = false;
        }

        // Helper function to hide error
        function hideError(fieldId) {
            const errorEl = document.getElementById(`error-${fieldId}`);
            const inputEl = document.getElementById(fieldId);
            if (errorEl) errorEl.classList.add('hidden');
            if (inputEl) {
                inputEl.classList.remove('border-red-500', 'ring-1', 'ring-red-500');
            }
        }

        if (step === 1) {
            // Validate Event Name
            const eventName = document.getElementById('eventName').value.trim();
            if (!eventName) {
                showError('eventName');
            } else {
                hideError('eventName');
            }

            // Validate Start Date
            const startDate = document.getElementById('startDate').value;
            if (!startDate) {
                showError('startDate');
            } else {
                hideError('startDate');
            }

            // Validate Duration
            const duration = parseInt(document.getElementById('duration').value);
            if (!duration || duration < 1 || duration > 30) {
                showError('duration');
            } else {
                hideError('duration');
            }

            // Validate Guest Count
            const guestCount = document.getElementById('guestCount').value;
            if (!guestCount || guestCount < 1) {
                showError('guestCount');
            } else {
                hideError('guestCount');
            }
        } else if (step === 2) {
            // Validate Full Name
            const fullName = document.getElementById('fullName').value.trim();
            if (!fullName) {
                showError('fullName');
            } else {
                hideError('fullName');
            }

            // Validate Phone
            const phone = document.getElementById('phone').value.trim();
            if (!phone || phone.length < 9 || phone.length > 13) {
                showError('phone');
            } else {
                hideError('phone');
            }

            // Validate Email
            const email = document.getElementById('email').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email)) {
                showError('email');
            } else {
                hideError('email');
            }
        }

        if (!isValid) {
            // Focus on first error
            const firstError = document.querySelector('.border-red-500');
            if (firstError) firstError.focus();
        }

        return isValid;
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            if (validateStep(currentStep)) {
                currentStep++;
                updateWizardState();
            }
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            currentStep--;
            updateWizardState();
        });
    }


    // Submit Handler
    if (bookingForm) {
        bookingForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            // Get submit button for loading state
            const submitButton = document.getElementById('submitBtn');
            const originalText = submitButton.innerHTML;

            // Show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="material-icons text-sm animate-spin">refresh</span> Menyimpan...';

            try {
                // Get Form Data
                const formData = new FormData(bookingForm);
                const data = Object.fromEntries(formData.entries());

                // Send to API
                const response = await fetch('api/booking.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                // Debug: log the response
                console.log('API Response:', result);

                if (result.success) {
                    // Success! Show confirmation
                    alert('✅ Booking berhasil disimpan!\n\nAnda akan diarahkan ke WhatsApp Admin untuk konfirmasi.');

                    // Prepare WhatsApp message
                    const adminPhone = "6285261767139"; // Nomor WA Admin
                    const bookingId = result.data?.booking_id || result.booking_id || 'N/A';

                    console.log('Booking ID:', bookingId);

                    // Format date range
                    const startDateFormatted = displayDate.value || data.startDate;
                    const durationText = data.duration == 1 ? '1 Hari' : `${data.duration} Hari`;

                    const text = `Halo Admin, saya ingin booking gedung:%0A%0A` +
                        `*ID Booking: ${bookingId}*%0A%0A` +
                        `*Rencana Acara*%0A` +
                        `Nama Acara: ${data.eventName}%0A` +
                        `Tanggal: ${startDateFormatted}%0A` +
                        `Durasi: ${durationText}%0A` +
                        `Estimasi Tamu: ${data.guestCount} orang%0A%0A` +
                        `*Data Pemesan*%0A` +
                        `Nama: ${data.fullName}%0A` +
                        `WhatsApp: +62${data.phone}%0A` +
                        `Email: ${data.email}%0A%0A` +
                        `Mohon info ketersediaan dan harga. Terima kasih!`;

                    // Redirect to WhatsApp
                    window.open(`https://wa.me/${adminPhone}?text=${text}`, '_blank');

                    // Reset form after delay
                    setTimeout(() => {
                        bookingForm.reset();
                        currentStep = 1;
                        updateWizardState();
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalText;
                    }, 1500);

                } else {
                    // Show error
                    let errorMsg = result.message || 'Terjadi kesalahan';
                    if (result.errors && result.errors.length > 0) {
                        errorMsg += ':\n- ' + result.errors.join('\n- ');
                    }
                    alert('❌ ' + errorMsg);

                    submitButton.disabled = false;
                    submitButton.innerHTML = originalText;
                }

            } catch (error) {
                console.error('Error:', error);
                alert('⚠️ Gagal menghubungi server. Pastikan koneksi internet Anda stabil.');

                submitButton.disabled = false;
                submitButton.innerHTML = originalText;
            }
        });
    }



    // === Chatbot Logic ===
    const chatBtn = document.getElementById('chat-toggle');
    const chatWindow = document.getElementById('chat-window');
    const closeChat = document.getElementById('close-chat');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');
    const chatSend = document.getElementById('chat-send');

    // Toggle chat window
    if (chatBtn && chatWindow) {
        chatBtn.addEventListener('click', () => {
            chatWindow.classList.toggle('hidden');
            chatWindow.classList.toggle('scale-0');
            chatWindow.classList.toggle('opacity-0');
            if (!chatWindow.classList.contains('hidden')) {
                chatWindow.classList.remove('scale-0', 'opacity-0');
                chatInput.focus();
            }
        });

        closeChat.addEventListener('click', () => {
            chatWindow.classList.add('hidden', 'scale-0', 'opacity-0');
        });
    }

    // Send message function
    async function sendChatMessage(message) {
        if (!message.trim()) return;

        // Add user message to UI
        const userMsg = document.createElement('div');
        userMsg.className = 'chat-message user shadow-sm';
        userMsg.textContent = message;
        chatMessages.appendChild(userMsg);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Clear input
        chatInput.value = '';

        // Show typing indicator
        const typingIndicator = document.createElement('div');
        typingIndicator.className = 'chat-message bot shadow-sm';
        typingIndicator.id = 'typing-indicator';
        typingIndicator.innerHTML = '<span class="animate-pulse">Mengetik...</span>';
        chatMessages.appendChild(typingIndicator);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Disable send button
        chatSend.disabled = true;
        chatInput.disabled = true;

        try {
            const response = await fetch('api/chatbot_bridge.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ message: message })
            });

            const result = await response.json();

            // Remove typing indicator
            typingIndicator.remove();

            // Add bot response
            const botMsg = document.createElement('div');
            botMsg.className = 'chat-message bot shadow-sm';
            botMsg.textContent = result.reply || 'Maaf, terjadi kesalahan.';
            chatMessages.appendChild(botMsg);
            chatMessages.scrollTop = chatMessages.scrollHeight;

        } catch (error) {
            console.error('Chat error:', error);

            // Remove typing indicator
            if (document.getElementById('typing-indicator')) {
                document.getElementById('typing-indicator').remove();
            }

            // Show error message
            const errorMsg = document.createElement('div');
            errorMsg.className = 'chat-message bot shadow-sm bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-400';
            errorMsg.textContent = '⚠️ Maaf, sistem chatbot sedang sibuk. Silakan coba lagi.';
            chatMessages.appendChild(errorMsg);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        } finally {
            // Re-enable send button
            chatSend.disabled = false;
            chatInput.disabled = false;
            chatInput.focus();
        }
    }

    // Handle form submit
    if (chatForm) {
        chatForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const message = chatInput.value.trim();
            if (message) {
                sendChatMessage(message);
            }
        });
    }

    // === Mobile Menu Toggle ===
    if (mobileMenuButton && mobileMenu) {
        // Toggle menu on button click
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close menu when clicking on a link
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }
});

