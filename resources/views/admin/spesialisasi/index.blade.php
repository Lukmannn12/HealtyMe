<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Spesialisasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-2">
                        <h1 class="text-xl font-bold mb-4">Manajemen Data Spesialisasi</h1>

                        <a href="{{ route('spesialisasi.create') }}"
                            class="inline-block bg-green-500 text-sm text-white font-semibold px-4 py-2 rounded shadow transition">
                            + Tambah Data
                        </a>

                        @if (session()->has('message'))
                        <div id="alert" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg opacity-0 transform translate-y-[-10px] transition-all duration-500 z-50">
                            {{ session('message') }}
                        </div>
                        @endif

                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto border-collapse mt-4 text-sm text-center">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border p-2">Id</th>
                                        <th class="border p-2">Nama Spesialiasi</th>
                                        <th class="border p-2">Logo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $spesialisasis as $spesialisasi )
                                    <tr class="hover:bg-gray-50">
                                        <td class="border p-2">{{ $spesialisasi->id }}</td>
                                        <td class="border p-2">{{ $spesialisasi->nama_spesialisasi }}</td>
                                        <td class="border p-2 text-center">
                                            @if ($spesialisasi->gambar)
                                            <img src="{{ asset('storage/' . $spesialisasi->gambar) }}" alt="Logo" class="h-12 w-12 object-contain mx-auto">
                                            @else
                                            <span class="text-gray-400 italic">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.getElementById('alert');
            if (alert) {
                // Tampilkan alert
                setTimeout(() => {
                    alert.classList.remove('opacity-0', 'translate-y-[-10px]');
                    alert.classList.add('opacity-100', 'translate-y-0');
                }, 100); // Delay sedikit agar transisi smooth

                // Sembunyikan alert setelah 3 detik
                setTimeout(() => {
                    alert.classList.remove('opacity-100', 'translate-y-0');
                    alert.classList.add('opacity-0', 'translate-y-[-10px]');
                }, 3000);
            }
        });
    </script>

</x-app-layout>