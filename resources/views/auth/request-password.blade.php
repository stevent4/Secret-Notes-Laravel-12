<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Ajukan permintaan password baru jika Anda tidak bisa login dan tidak punya akses email.
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.request.store') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input type="email" name="email" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="reason" :value="__('Alasan (Opsional)')" />
            <textarea name="reason" class="block mt-1 w-full border rounded"></textarea>
        </div>

        <div class="mt-4">
            <x-primary-button>
                {{ __('Kirim Permintaan') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
