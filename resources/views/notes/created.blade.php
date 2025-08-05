<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md space-y-6">

        <h2 class="text-2xl font-semibold text-gray-800">Catatan berhasil dibuat 🎉</h2>

        <div class="space-y-1">
            <p class="font-medium text-gray-700">Status:
                @if (!empty($alreadyOpened) && $alreadyOpened)
                    <span class="text-red-500 font-semibold">Sudah dibuka</span>
                @else
                    <span class="text-green-600 font-semibold">Belum dibuka</span>
                @endif
            </p>

            @if ($note->expires_at)
                <p class="font-medium text-gray-700">
                    Kedaluwarsa: <span id="countdown" class="text-yellow-600 font-semibold">–</span>
                </p>

                <script>
                    const targetTime = new Date("{{ \Carbon\Carbon::parse($note->expires_at)->toIso8601String() }}").getTime();
                    const countdownElement = document.getElementById('countdown');

                    const interval = setInterval(() => {
                        const now = new Date().getTime();
                        const distance = targetTime - now;

                        if (distance <= 0) {
                            countdownElement.innerText = "Sudah kedaluwarsa";
                            clearInterval(interval);
                            return;
                        }

                        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        countdownElement.innerText = `${minutes}m ${seconds}s`;
                    }, 1000);
                </script>
            @endif
        </div>

        <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 text-sm p-3 rounded">
            ⚠️ Catatan ini akan <strong>hancur</strong> setelah dibuka.
        </div>

        <div>
            <p class="text-gray-700 mb-2">Bagikan link berikut:</p>
            <div class="flex items-center gap-2">
                <input id="note-url" type="text" readonly value="{{ $url }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300" />
                <button id="copy-btn" onclick="copyLinkOnce()"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg transition">
                    📋 Salin
                </button>
                <p class="text-sm text-gray-500 mt-2">Kamu akan diarahkan kembali dalam <span
                        id="redirect-time">10</span> detik...</p>
            </div>
        </div>

        <script>
            let copied = false;

            function copyLinkOnce() {
                if (copied) return;

                const input = document.getElementById('note-url');
                const btn = document.getElementById('copy-btn');
                input.select();
                input.setSelectionRange(0, 99999);
                document.execCommand('copy');

                copied = true;
                btn.innerText = '✅ Disalin!';
                btn.disabled = true;
                btn.classList.add('bg-gray-400', 'cursor-not-allowed');
                btn.classList.remove('bg-blue-600', 'hover:bg-blue-700');

                // Mulai hitung mundur redirect (10 detik)
                let seconds = 10;
                const timerText = document.getElementById('redirect-time');
                const interval = setInterval(() => {
                    seconds--;
                    timerText.textContent = seconds;
                    if (seconds <= 0) clearInterval(interval);
                }, 1000);

                setTimeout(() => {
                    window.location.replace("{{ route('notes.create') }}");
                }, 10000);
            }
        </script>

    </div>
</x-app-layout>
