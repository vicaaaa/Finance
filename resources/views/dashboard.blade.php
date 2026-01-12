<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="p-6 bg-blue-600 text-white rounded-xl shadow-md mb-6 flex justify-between items-center">
                <div>
                    <h3 class="text-lg opacity-80 font-medium">Total Saldo Saya</h3>
                    <p class="text-4xl font-bold">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</p>
                </div>
                <div class="text-5xl opacity-20">
                    💰
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm mb-6 border border-gray-100">
                <h4 class="font-semibold mb-4 text-gray-700">Isi Tabungan / Kas</h4>
                <form action="{{ route('tabungan.store') }}" method="POST" class="flex flex-col sm:flex-row gap-4">
                    @csrf
                    <input type="number" name="nominal" placeholder="Nominal (Contoh: 50000)" 
                           class="border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 flex-1" required>
                    
                    <input type="text" name="keterangan" placeholder="Keterangan (Opsional)" 
                           class="border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 flex-1">
                    
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
                        Simpan
                    </button>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Riwayat Tabungan</h3>
                    
                    <div class="overflow-x-auto rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 border-b">ID</th>
                                    <th class="px-6 py-4 border-b">Tanggal</th>
                                    <th class="px-6 py-4 border-b">Nominal</th>
                                    <th class="px-6 py-4 border-b">Keterangan</th>
                                    <th class="px-6 py-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($tabungans as $t)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">#{{ $t->id }}</td>
                                    <td class="px-6 py-4">{{ $t->created_at->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 text-blue-600 font-semibold">
                                        Rp {{ number_format($t->nominal, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $t->keterangan ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('tabungan.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-400">Belum ada data tabungan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>