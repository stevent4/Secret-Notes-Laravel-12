<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Catatan Rahasia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow space-y-6">
        <h2 class="text-2xl font-bold text-gray-800">Akses Catatan Rahasia 🔐</h2>

        @if ($note->password)
            <div class="space-y-2">
                <p><strong>Status:</strong>
                    @if ($note->viewed)
                        <span class="text-red-500">Sudah dibuka</span>
                    @else
                        <span class="text-green-600">Belum dibuka</span>
                    @endif
                </p>

                @if ($note->expires_at)
                    <p><strong>Kedaluwarsa:</strong> <span id="countdown">Menghitung...</span></p>
                @endif

                <p class="text-yellow-600 text-sm">Catatan ini akan hancur setelah dibuka.</p>
            </div>

            <form method="POST" action="{{ route('notes.access', $note->uuid) }}" class="space-y-4 mt-4">
                @csrf
                <input type="password" name="password" placeholder="Masukkan password"
                    class="border w-full p-3 rounded-lg" required>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded w-full font-semibold hover:bg-blue-700 transition">
                    Lihat Catatan
                </button>
            </form>
        @else
            <form method="POST" action="{{ route('notes.access', $note->uuid) }}">
                @csrf
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-700 transition">
                    Lihat Catatan
                </button>
            </form>
        @endif
    </div>

    @if ($note->expires_at)
    <script>
        const targetTime = new Date("{{ $note->expires_at->toIso8601String() }}").getTime();
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
</body>

</html>
