<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Status Login -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">👤 Status Login</h3>
                <p class="text-gray-600">Anda masuk sebagai: <span class="font-semibold">{{ Auth::user()->email }}</span>
                </p>
                <p class="text-gray-600">Role: <span
                        class="font-semibold">{{ Auth::user()->is_admin ? 'Admin' : 'Pengguna' }}</span></p>
            </div>

            <!-- Deskripsi Website -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">🔐 Apa Itu Secret Notes?</h3>
                <p class="text-gray-600 leading-relaxed">
                    <strong>Secret Notes</strong> adalah aplikasi web untuk mengirimkan catatan rahasia secara aman dan
                    <strong>sekali baca</strong>. Setelah dibuka satu kali, catatan akan langsung terhapus dan tidak
                    bisa diakses kembali.
                    Cocok untuk mengirimkan informasi sensitif seperti password sementara, pesan privat, token rahasia,
                    atau link OTP.
                </p>
            </div>

            <!-- Fitur Yang Sudah Ada -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">✅ Fitur yang Tersedia Saat Ini</h3>
                <ul class="list-disc list-inside text-gray-600 space-y-1">
                    <li>📥 Buat Catatan Rahasia dengan URL unik</li>
                    <li>🧨 Sekali buka langsung hancur (Self-Destruct)</li>
                    <li>📜 Histori Catatan oleh pengguna</li>
                    <li>📛 Badge peringatan jika catatan bersifat sensitif</li>
                    <li>⏳ Hitung mundur / Expired Timer (opsional)</li>
                    <li>🔒 Status: sudah dibaca atau belum</li>
                    <li>🛡️ Panel Admin untuk reset password pengguna</li>
                    <li>✉️ Ajukan Password Baru bagi user tanpa akses email</li>
                </ul>
            </div>

            <!-- Fitur Mendatang -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">🚀 Fitur Mendatang (Rencana)</h3>
                <ul class="list-disc list-inside text-gray-600 space-y-1">
                    <li>🔑 Enkripsi end-to-end client-side (AES256)</li>
                    <li>📱 QR Code untuk akses catatan</li>
                    <li>📆 Sinkronisasi catatan dengan Google Calendar</li>
                    <li>🕵️ Mode incognito: auto-hapus 30 detik setelah buka</li>
                    <li>📊 Statistik catatan: jumlah dibuka, waktu buka</li>
                    <li>🛠️ Fitur backup dan restore untuk admin</li>
                </ul>
            </div>

            <!-- Konten & Proyek Mendatang -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">🔮 Konten & Proyek Mendatang (Wacana)</h3>
                <p class="text-gray-600 mb-3">
                    Di luar pengembangan Secret Notes, ke depan akan hadir berbagai tools sederhana namun bermanfaat
                    untuk kehidupan digital yang lebih aman dan produktif:
                </p>
                <ul class="list-disc list-inside text-gray-600 space-y-1">
                    <li>🔗 <strong>ShortLink Pro</strong>: pemendek URL dengan statistik klik & QR</li>
                    <li>📋 <strong>SimplePaste</strong>: tempat tempel catatan/temp kode seperti Pastebin</li>
                    <li>📤 <strong>FileDrop</strong>: kirim file satu arah dengan batas waktu dan password</li>
                    <li>🧾 <strong>NotaKu</strong>: catatan pribadi berbasis tag, dengan fitur ekspor PDF</li>
                    <li>🗓️ <strong>AgendaLink</strong>: buat link janji ketemuan dengan sinkronisasi kalender</li>
                    <li>📮 <strong>Inbox Dummy</strong>: email testing gratis (tanpa akun, auto delete)</li>
                    <li>🕓 <strong>ReminderMe</strong>: pengingat cepat via notifikasi browser dan email</li>
                    <li>🧠 <strong>MindVault</strong>: arsip pribadi untuk ide, artikel, dan referensi penting</li>
                    <li>🧹 <strong>LinkCleaner</strong>: hapus parameter tracking dari link otomatis</li>
                    <li>🔐 <strong>PasswordBox</strong>: penyimpanan password sementara untuk tim kecil</li>
                </ul>
                <p class="text-gray-600 mt-3">
                    Semua proyek ini akan dibuat dengan semangat (lek gak mager wkwk): <em>open source, ringan, privat, dan tanpa iklan</em>.
                </p>
            </div>


            <!-- Teknologi yang Digunakan -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">🧪 Teknologi yang Digunakan</h3>
                <ul class="list-disc list-inside text-gray-600 space-y-1">
                    <li>🧠 <strong>Laravel 12</strong> (Backend Framework)</li>
                    <li>🎨 <strong>Blade + Tailwind CSS</strong> (Frontend UI)</li>
                    <li>🗃️ <strong>MySQL</strong> (Database)</li>
                    <li>🔐 <strong>Laravel Breeze</strong> untuk autentikasi</li>
                    <li>⚙️ <strong>Alpine.js</strong> untuk interaktivitas ringan</li>
                    <li>🛡️ Middleware Auth + Role (Admin/User)</li>
                </ul>
            </div>

            <!-- Kelebihan & Kekurangan -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">⚖️ Kelebihan & Kekurangan</h3>
                <div class="grid md:grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <h4 class="font-semibold text-green-700">👍 Kelebihan</h4>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Privasi maksimal (sekali buka langsung hilang)</li>
                            <li>Tidak butuh login untuk membuka catatan</li>
                            <li>Antarmuka sederhana & cepat digunakan</li>
                            <li>Open for improvement & kolaborasi</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-red-700">👎 Kekurangan</h4>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Jika URL bocor, bisa dibuka orang lain</li>
                            <li>Catatan tidak bisa dipulihkan setelah dihapus</li>
                            <li>Tidak ada log detail pengakses publik</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tentang Developer -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">👨‍💻 Tentang Developer</h3>
                <p class="text-gray-600">
                    Created by <strong class="text-indigo-700">Stevent</strong>, pengembang web yang tertarik pada
                    privasi, keamanan informasi, dan produktivitas digital. Proyek ini dibangun sebagai pembelajaran dan
                    eksplorasi terhadap teknologi Laravel dan manajemen informasi sensitif.
                </p>
                <div class="mt-3 flex items-center space-x-4 text-sm text-gray-500">
                    <a href="https://github.com/stevent4" target="_blank" class="hover:text-black underline">🌐
                        GitHub</a>
                    <a href="https://instagram.com/a.stevents" target="_blank" class="hover:text-pink-500 underline">📷
                        Instagram</a>
                </div>
            </div>

            <!-- Catatan -->
            <div class="text-center text-sm text-gray-500 mt-6">
                ✨ Terima kasih telah menggunakan Secret Notes! Kritik dan saran selalu terbuka 💬
            </div>
        </div>
    </div>
</x-app-layout>
