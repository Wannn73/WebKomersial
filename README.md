# WebKomersial - Gedung Serbaguna Booking System

> Platform penyewaan gedung serbaguna dengan sistem booking online, integrasi WhatsApp, dan AI chatbot support.

## 📋 Deskripsi Project

WebKomersial adalah platform web untuk booking gedung serbaguna yang dikembangkan sebagai project PKL di PTPN IV. Platform ini memungkinkan user untuk:
- Melihat kalender ketersediaan gedung secara real-time
- Melakukan booking dengan form wizard multi-step
- Mendapatkan konfirmasi via WhatsApp
- Bertanya melalui AI chatbot

## 🚀 Fitur Utama

### 1. **Booking System**
- Form wizard 3 langkah (Jadwal → Detail Pemesan → Konfirmasi)
- Validasi lengkap (email, phone, tanggal)
- Simpan otomatis ke database
- Redirect ke WhatsApp admin dengan Booking ID

### 2. **Dynamic Calendar**
- Tampilan kalender interaktif
- Auto-load tanggal yang sudah dibooking dari database
- Block tanggal yang tidak tersedia
- Support multi-day bookings

### 3. **WhatsApp Integration**
- Format pesan otomatis dengan detail booking
- Include Booking ID untuk tracking
- Nomor admin: 085261767139

### 4. **AI Chatbot (n8n)**
- Support FAQ umum
- Session management per user
- Integrasi via webhook

## 🛠️ Tech Stack

- **Frontend:** HTML5, TailwindCSS, JavaScript (Vanilla)
- **Backend:** PHP Native
- **Database:** MySQL (MariaDB)
- **External:** n8n Webhook (Chatbot)

## 📁 Struktur File

```
WebKomersial/
├── api/
│   ├── booking.php              # API submit booking
│   ├── check-availability.php   # API cek ketersediaan
│   └── chatbot_bridge.php       # Bridge n8n chatbot
├── assets/
│   ├── css/
│   │   └── style.css           # Custom styles
│   └── js/
│       └── script.js           # Main JavaScript
├── config/
│   └── database.php            # Database connection
├── index.php                    # Homepage
├── db_sewagedung.sql           # Database schema
└── test-*.php                  # Testing tools (hapus untuk production)
```

## ⚙️ Installation & Setup

### 1. Requirements
- XAMPP (Apache + MySQL)
- PHP 7.4+
- Browser modern (Chrome, Firefox, Edge)

### 2. Database Setup
```bash
1. Buka phpMyAdmin (http://localhost/phpmyadmin)
2. Create database: db_sewagedung
3. Import file: db_sewagedung.sql
```

### 3. Configuration
Edit `config/database.php` jika perlu:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_sewagedung');
```

### 4. n8n Chatbot (Optional)
Update URL webhook di `api/chatbot_bridge.php`:
```php
$n8n_webhook_url = 'YOUR_NGROK_URL/webhook/chat-ai';
```

### 5. Run Project
```bash
1. Start XAMPP (Apache + MySQL)
2. Buka browser: http://localhost/WebKomersial
```

## 🧪 Testing

### Test Database Connection
```
http://localhost/WebKomersial/test-connection.php
```

### Test Booking API
```
http://localhost/WebKomersial/test-booking.php
```

### Test Calendar API
```
http://localhost/WebKomersial/test-calendar.php
```

## 📊 Database Schema

### Table: `booking`
| Field | Type | Description |
|-------|------|-------------|
| id | INT (PK) | Auto increment ID |
| nama_lengkap | VARCHAR(150) | Full name |
| no_hp | VARCHAR(20) | Phone number |
| email | VARCHAR(100) | Email address |
| nama_acara | VARCHAR(200) | Event name |
| tgl_mulai | DATE | Start date |
| tgl_selesai | DATE | End date |
| jam_acara | VARCHAR(50) | Time slot |
| jumlah_tamu | INT | Guest count |
| created_at | DATETIME | Timestamp |

## 🔐 API Endpoints

### POST `/api/booking.php`
Submit new booking
```json
{
  "startDate": "2026-02-15",
  "duration": "1 Hari",
  "guestCount": 100,
  "fullName": "John Doe",
  "phone": "81234567890",
  "email": "test@example.com"
}
```

### GET `/api/check-availability.php`
Get booked dates (optional: ?month=2&year=2026)
```json
{
  "success": true,
  "data": {
    "booked_dates": ["2026-02-15", "2026-02-16"],
    "bookings": [...]
  }
}
```

### POST `/api/chatbot_bridge.php`
Send chat message
```json
{
  "message": "Halo"
}
```

## 👥 Team

**Frontend Developer:** [Your Name]  
**Backend Developer:** [Team Member]  
**UI/UX Designer:** [Team Member]  
**n8n Developer:** [Team Member]

**Tempat PKL:** PTPN IV  
**Periode:** 2026

## 📝 Notes

### Production Deployment
Sebelum deploy:
1. Hapus semua file `test-*.php`
2. Update database credentials
3. Update n8n webhook URL
4. Enable error logging di `php.ini`
5. Set proper file permissions

### Known Issues
- n8n chatbot requires external server (ngrok)
- Calendar only shows current year bookings

## 📄 License

Project ini dibuat untuk keperluan PKL. All rights reserved.

---

**Current Version:** 1.0.0  
**Last Updated:** 11 Februari 2026
