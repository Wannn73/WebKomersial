# 🚀 Deployment Guide - WebKomersial

Panduan lengkap untuk deploy project WebKomersial ke production/staging server.

## 📋 Pre-Deployment Checklist

### 1. Persiapan File
- [ ] Hapus semua test files
- [ ] Update database credentials
- [ ] Update WhatsApp admin number (jika berubah)
- [ ] Update n8n webhook URL (jika berubah)
- [ ] Review konfigurasi PHP

### 2. Database
- [ ] Export database dari development
- [ ] Bersihkan data test dari table
- [ ] Backup database production (jika update)

### 3. Security
- [ ] Set file permissions yang benar
- [ ] Enable error logging (production mode)
- [ ] Disable PHP error display
- [ ] Review API endpoints security

---

## 🗑️ Cleanup untuk Production

### Hapus Test Files
```bash
cd c:\xampp\htdocs\WebKomersial
del test-booking.php
del test-calendar.php
del test-connection.php
del "Brief Project Web Komersial ( PKL PTPN IV ).txt"
del "Rancangan Database WebKomersial.txt"
del "Frame 1.png"
```

Atau manual, hapus file:
- `test-booking.php`
- `test-calendar.php`
- `test-connection.php`
- `Brief Project Web Komersial ( PKL PTPN IV ).txt`
- `Rancangan Database WebKomersial.txt`
- `Frame 1.png`

---

## 🔧 Konfigurasi Production

### 1. Database Configuration
Edit `config/database.php`:
```php
<?php
// Production Database Settings
define('DB_HOST', 'your_production_host');
define('DB_USER', 'your_production_user');
define('DB_PASS', 'your_production_password');
define('DB_NAME', 'db_sewagedung');

// Disable error display in production
error_reporting(0);
ini_set('display_errors', 0);
?>
```

### 2. PHP Error Handling
Create `php_error.log` file untuk logging errors tanpa display ke user.

### 3. .htaccess Security (Optional)
Create `.htaccess`:
```apache
# Disable directory browsing
Options -Indexes

# Protect config folder
<Files "config/*.php">
    Order allow,deny
    Deny from all
</Files>

# Enable GZIP compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/css application/javascript
</IfModule>
```

---

## 📤 Upload ke Server

### Method 1: FTP/SFTP
1. Connect ke server via FileZilla/WinSCP
2. Upload semua file ke `public_html` atau `www` folder
3. Pastikan struktur folder tetap sama

### Method 2: Git (Recommended)
```bash
# Init git (jika belum)
git init
git add .
git commit -m "Production ready"

# Push ke repository
git remote add origin <your-repo-url>
git push -u origin main

# Di server, pull dari git
git clone <your-repo-url>
```

---

## 🗄️ Database Migration

### 1. Export dari Development
```sql
-- Di phpMyAdmin development
1. Pilih database db_sewagedung
2. Export → SQL Format
3. Save file
```

### 2. Import ke Production
```sql
-- Di phpMyAdmin production
1. Create database: db_sewagedung
2. Import SQL file
3. Verify tables created
```

### 3. Clean Test Data (Optional)
```sql
-- Hapus booking test
DELETE FROM booking WHERE email LIKE '%@example.com';

-- Reset auto increment
ALTER TABLE booking AUTO_INCREMENT = 1;
```

---

## 🔐 File Permissions (Linux Server)

```bash
# Set owner
chown -R www-data:www-data /var/www/html/WebKomersial

# Set directories
find /var/www/html/WebKomersial -type d -exec chmod 755 {} \;

# Set files
find /var/www/html/WebKomersial -type f -exec chmod 644 {} \;

# Config folder (more restrictive)
chmod 750 /var/www/html/WebKomersial/config
chmod 640 /var/www/html/WebKomersial/config/database.php
```

---

## 🤖 n8n Chatbot Setup

### Development (ngrok)
```bash
# Di laptop teman yang running n8n
ngrok http 5678
# Copy URL, update di chatbot_bridge.php
```

### Production
2 Options:

**Option 1: Deploy n8n to Cloud**
- Heroku, Railway, atau VPS
- Update webhook URL di `api/chatbot_bridge.php`

**Option 2: Disable Chatbot**
```javascript
// Di assets/js/script.js
// Comment out chatbot floating button display
// chatBtn.style.display = 'none';
```

---

## ✅ Post-Deployment Testing

### 1. Basic Functionality
- [ ] Homepage loads correctly
- [ ] Calendar shows properly
- [ ] All sections visible (About, Facilities, Gallery)

### 2. Booking Flow
- [ ] Calendar allows date selection
- [ ] Form wizard works (3 steps)
- [ ] Data saves to database
- [ ] WhatsApp redirect works with correct number

### 3. Database
- [ ] Connection successful
- [ ] Bookings save correctly
- [ ] Calendar loads booked dates

### 4. APIs
- [ ] `/api/booking.php` works
- [ ] `/api/check-availability.php` returns data
- [ ] `/api/chatbot_bridge.php` connects to n8n (or handle gracefully if disabled)

### 5. Mobile & Browser
- [ ] Test di Chrome
- [ ] Test di Firefox
- [ ] Test di Safari (Mac/iPhone)
- [ ] Test di Edge
- [ ] Test responsive mobile

---

## 🐛 Troubleshooting Production

### Database Connection Failed
```
- Cek credentials di config/database.php
- Cek MySQL service running
- Cek firewall allow port 3306
```

### WhatsApp Not Opening
```
- Cek nomor admin format: 6285261767139
- Cek URL encoding di JavaScript
```

### Calendar Not Loading Dates
```
- Cek browser console for errors
- Test API: yoursite.com/api/check-availability.php
- Verify database connection
```

### n8n Chatbot Error
```
- Cek webhook URL masih valid
- Cek n8n workflow active
- Cek network connectivity to n8n server
```

---

## 📊 Monitoring & Maintenance

### Regular Tasks
1. **Daily:** Check error logs
2. **Weekly:** Backup database
3. **Monthly:** Update dependencies (if any)
4. **Quarterly:** Review and clean old bookings

### Backup Strategy
```bash
# Automated backup (Linux cron)
0 2 * * * mysqldump -u user -p'password' db_sewagedung > /backup/db_$(date +\%Y\%m\%d).sql
```

---

## 🔄 Update Workflow

Untuk update fitur di production:
1. Test di development (localhost)
2. Commit to git
3. Pull di production server
4. Test di staging (jika ada)
5. Apply ke production
6. Monitor errors 24 jam

---

## 🆘 Emergency Rollback

Jika ada masalah critical:
```bash
# Restore previous version from git
git log  # find commit hash
git reset --hard <commit-hash>

# Restore database
mysql -u user -p db_sewagedung < backup_file.sql
```

---

**Deployment Guide v1.0**  
Last updated: 11 Februari 2026
