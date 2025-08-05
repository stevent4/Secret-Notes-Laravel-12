<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Daftar Permintaan Password Baru</h2>

        @if (session('status'))
            <div class="mb-4 text-green-600">{{ session('status') }}</div>
        @endif

        @forelse ($requests as $request)
            <div class="border rounded p-4 mb-4 shadow">
                <p><strong>Email:</strong> {{ $request->email }}</p>
                <p><strong>Alasan:</strong> {{ $request->reason ?: '-' }}</p>
                <p><small class="text-gray-500">Diajukan: {{ $request->created_at->diffForHumans() }}</small></p>

                <form method="POST" action="{{ route('admin.password.reset', $request->id) }}" class="mt-4 space-y-2">
                    @csrf
                    <div>
                        <input type="password" name="new_password" class="border rounded px-3 py-2 w-full"
                            placeholder="Password Baru" required>
                    </div>
                    <div>
                        <input type="password" name="new_password_confirmation" class="border rounded px-3 py-2 w-full"
                            placeholder="Konfirmasi Password" required>
                    </div>
                    <x-primary-button>Reset Password</x-primary-button>
                </form>

                <form method="POST" action="{{ route('admin.password.destroy', $request->id) }}"
                    class="inline-block mt-2">
                    @csrf
                    @method('DELETE')
                    <x-danger-button onclick="return confirm('Hapus permintaan ini?')">Hapus</x-danger-button>
                </form>

            </div>
        @empty
            <p class="text-gray-500">Belum ada permintaan.</p>
        @endforelse
    </div>
</x-app-layout>
