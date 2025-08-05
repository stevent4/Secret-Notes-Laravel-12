<x-app-layout>
    <div class="max-w-5xl mx-auto py-8" x-data="historyTable()">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Histori Catatan</h2>

        @if (session('status'))
            <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 rounded-lg shadow-sm">
                {{ session('status') }}
            </div>
        @endif

        <!-- Filter Buttons -->
        <div class="flex gap-2 mb-4">
            <button @click="status = 'all'" :class="status === 'all' ? activeClass : inactiveClass"
                class="px-3 py-1 rounded border">Semua</button>
            <button @click="status = 'opened'" :class="status === 'opened' ? activeClass : inactiveClass"
                class="px-3 py-1 rounded border">Sudah Dibuka</button>
            <button @click="status = 'unopened'" :class="status === 'unopened' ? activeClass : inactiveClass"
                class="px-3 py-1 rounded border">Belum Dibuka</button>
            <button @click="status = 'expired'" :class="status === 'expired' ? activeClass : inactiveClass"
                class="px-3 py-1 rounded border">Kedaluwarsa</button>
        </div>

        <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-600 font-semibold text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-2 text-left">UUID</th>
                        <th class="px-4 py-2 text-center">Status</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                        <th class="px-4 py-2 text-center">Kedaluwarsa</th>
                        <th class="px-4 py-2 text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <template x-for="log in filteredLogs()" :key="log.uuid">
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-2 font-mono text-xs text-gray-700" x-text="log.uuid"></td>
                            <td class="p-2 text-center"
                                x-html="
                                log.opened_at 
                                ? '<span class=&quot;text-red-600 font-semibold&quot;>Sudah Dibuka</span>'
                                : (log.expires_at && new Date(log.expires_at) <= new Date() 
                                    ? '<span class=&quot;text-gray-500 italic&quot;>Kedaluwarsa</span>' 
                                    : '<span class=&quot;text-green-600 font-semibold&quot;>Belum Dibuka</span>')">
                            </td>
                            <td class="p-2 text-center">
                                <template
                                    x-if="!log.opened_at && (!log.expires_at || new Date(log.expires_at) > new Date())">
                                    <button @click="copyLink(log.uuid)"
                                        class="text-blue-600 underline hover:text-blue-800">
                                        Salin Link
                                    </button>
                                </template>
                                <template
                                    x-if="log.opened_at || (log.expires_at && new Date(log.expires_at) <= new Date())">
                                    <span class="text-gray-400 italic">Tidak tersedia</span>
                                </template>
                            </td>
                            <td class="p-2 text-center"
                                x-text="
                                log.expires_at ? new Date(log.expires_at).toLocaleString() : '—'">
                            </td>
                            <td class="p-2 text-center">
                                <template
                                    x-if="log.opened_at || (log.expires_at && new Date(log.expires_at) <= new Date())">
                                    <form :action='`/notes/history/${log.uuid}`' method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </template>
                                <template
                                    x-if="!log.opened_at && (!log.expires_at || new Date(log.expires_at) > new Date())">
                                    <span class="text-gray-400 italic">—</span>
                                </template>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Alpine component -->
    <script>
        function historyTable() {
            return {
                logs: @json($logs),
                status: 'all',
                activeClass: 'bg-blue-600 text-white',
                inactiveClass: 'bg-white text-blue-600 border',
                filteredLogs() {
                    return this.logs.filter(log => {
                        const now = new Date();
                        const expired = log.expires_at && new Date(log.expires_at) <= now;

                        if (this.status === 'all') return true;
                        if (this.status === 'opened') return log.opened_at !== null;
                        if (this.status === 'unopened') return !log.opened_at && (!log.expires_at || new Date(log
                            .expires_at) > now);
                        if (this.status === 'expired') return !log.opened_at && expired;
                    });
                },
                copyLink(uuid) {
                    const url = '{{ url('/note') }}/' + uuid;
                    navigator.clipboard.writeText(url).then(() => {
                        alert('Tautan disalin!');
                    });
                }
            }
        }
    </script>
</x-app-layout>
