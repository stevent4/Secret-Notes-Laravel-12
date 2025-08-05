<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg space-y-6">
        <h2 class="text-2xl font-bold text-gray-800">Buat Catatan Rahasia 🔐</h2>
        <p class="text-sm text-gray-500">Catatan ini akan hancur sendiri setelah dibuka, atau setelah waktu yang kamu tentukan.</p>

        <form method="POST" action="{{ route('notes.store') }}" class="space-y-5">
            @csrf

            <div>
                <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Isi Catatan</label>
                <textarea name="note" id="note" rows="5" class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-lg p-3 resize-none shadow-sm" required>{{ old('note') }}</textarea>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password (opsional)</label>
                <input type="text" name="password" id="password" placeholder="Contoh: rahasia123"
                    class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-lg p-3 shadow-sm" />
            </div>

            <div>
                <label for="expire_minutes" class="block text-sm font-medium text-gray-700 mb-1">Hapus otomatis dalam (menit)</label>
                <input type="number" name="expire_minutes" id="expire_minutes" placeholder="Misal: 10"
                    class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-lg p-3 shadow-sm" />
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow">
                    🔒 Buat Catatan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
