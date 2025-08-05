# 🔐 Secret Notes

**Secret Notes** adalah aplikasi web untuk mengirimkan catatan rahasia secara aman dan hanya bisa dibaca **sekali**. Setelah dibuka, catatan akan langsung **dihapus otomatis** dari sistem.

---

## 🚀 Fitur Utama

- 📥 Buat catatan rahasia dengan URL unik
- 🧨 Sekali buka langsung hancur (Self-Destruct)
- 📜 Histori catatan oleh pengguna
- 📛 Badge peringatan untuk catatan sensitif
- ⏳ Hitung mundur kedaluwarsa (opsional)
- 🔒 Status catatan: sudah dibaca atau belum
- 🛡️ Panel Admin untuk reset password pengguna
- ✉️ Ajukan password baru (tanpa akses email)

---

## 🧪 Teknologi yang Digunakan

- 🧠 Laravel 12 (Backend Framework)
- 🎨 Blade + Tailwind CSS (Frontend UI)
- 🗃️ MySQL (Database)
- 🔐 Laravel Breeze untuk autentikasi
- ⚙️ Alpine.js untuk interaktivitas ringan
- 🛡️ Middleware Auth + Role (Admin/User)

---

## 📦 Instalasi & Penggunaan

```bash
git clone https://github.com/username/secret-notes.git
cd secret-notes

# Install dependensi
composer install
npm install && npm run build

# Salin file env dan generate key
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate

# Jalankan server
php artisan serve
```

---

## 📁 Struktur Folder Penting

- `app/Models/Note.php` – Model untuk catatan rahasia
- `app/Http/Controllers/NoteController.php` – Logika backend catatan
- `resources/views/notes/` – Tampilan blade catatan
- `routes/web.php` – Routing aplikasi

---

## 📌 Fitur Mendatang (Rencana)

- 🔑 Enkripsi end-to-end (AES256)
- 📱 QR Code untuk akses cepat
- 📆 Sinkronisasi dengan Google Calendar
- 🕵️ Mode incognito: auto-hapus 30 detik
- 📊 Statistik catatan
- 🛠️ Backup & restore catatan (admin)

---

## 🌐 Proyek Tambahan (Wacana)

- 🔗 **ShortLink Pro** – pemendek URL + statistik
- 📋 **SimplePaste** – paste kode/tempel teks aman
- 📤 **FileDrop** – kirim file 1 arah + password
- 🧾 **NotaKu** – catatan pribadi + PDF ekspor
- 📮 **Inbox Dummy** – email testing tanpa login
- 🔐 **PasswordBox** – penyimpan password sementara

---

## 👨‍💻 Tentang Developer

Created by **Stevent**, pengembang web yang fokus pada privasi, keamanan informasi, dan produktivitas digital.

- 🌐 [GitHub](https://github.com/stevent4)
- 📷 [Instagram](https://instagram.com/a.stevents)

---

## 📃 Lisensi

Proyek ini bersifat open-source dan bebas digunakan untuk pembelajaran. Kontribusi sangat dipersilakan!