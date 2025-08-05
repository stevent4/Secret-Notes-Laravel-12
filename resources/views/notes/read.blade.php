<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Isi Catatan Rahasia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN (jika tidak pakai Vite atau Mix) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="max-w-xl w-full bg-white p-6 rounded-2xl shadow-lg space-y-6">
        <h2 class="text-2xl font-bold text-gray-800">📜 Isi Catatan Rahasia</h2>

        <div
            class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-gray-700 font-mono whitespace-pre-wrap max-h-60 overflow-auto">
            {{ $note }}
        </div>


        <div class="text-sm text-red-600 bg-red-50 border border-red-200 p-3 rounded-md">
            ⚠️ Catatan ini telah otomatis dihapus dari sistem setelah dibuka.
        </div>

        <div class="text-right pt-2">
            <a href="{{ route('notes.create') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                🔁 Buat Catatan Baru
            </a>
        </div>
    </div>

</body>

</html>

