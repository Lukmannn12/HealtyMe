@extends('user.layouts.app')

@section('content')
@if(session('success'))
<div 
    x-data="{ show: true }" 
    x-init="setTimeout(() => show = false, 3000)" 
    x-show="show" 
    x-transition 
    class="fixed top-5 right-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg z-50"
>
    {{ session('success') }}
</div>
@endif

<div>
    <h1 class="font-bold text-3xl tracking-wider ">
        Chat Dokter @isset($spesialisasi) - {{ $spesialisasi->nama_spesialisasi }} @endisset
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 py-5 gap-7">
        @forelse($profiledokter as $dokter)
        <div class="flex flex-col md:flex-row lg:flex-row xl:flex-row p-3 gap-5 border border-[#095D7E] pt-6">
            <img src="{{ asset('storage/' . $dokter->gambar ?? 'image/cokter.png') }}" class="rounded-full w-[169px] h-[169px] object-cover">
            <div class="flex flex-col justify-between flex-1">
                <div class="flex flex-col justify-center py-4">
                    <h1 class="font-bold text-xl tracking-wider">{{ $dokter->user->name ?? 'Nama tidak tersedia' }}</h1>
                    <p class="font-normal text-base text-[#696969] pb-2 pt-1">
                        {{ $dokter->spesialisasi->nama_spesialisasi ?? 'Tidak ada spesialisasi' }}
                    </p>
                    <div class="flex flex-row gap-5 pb-1 py-2">
                        <div class="bg-[rgba(165,165,177,0.25)] flex flex-row px-2 py-1 gap-3 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="#000" d="M12 2a7 7 0 0 1 7 7h1.074a1 1 0 0 1 .997.923l.846 11a1 1 0 0 1-.92 1.074L20.92 22H3.08a1 1 0 0 1-1-1l.003-.077l.846-11A1 1 0 0 1 3.926 9H5a7 7 0 0 1 7-7m2 11h-4v2h4zm-2-9a5 5 0 0 0-4.995 4.783L7 9h10a5 5 0 0 0-4.783-4.995z" />
                            </svg>
                            <h1 class="text-sm font-normal">{{ $dokter->years_of_experience }} tahun</h1>
                        </div>
                        <div class="bg-[rgba(165,165,177,0.25)] flex flex-row px-2 py-1 gap-3 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="#000" d="M23 10a2 2 0 0 0-2-2h-6.32l.96-4.57c.02-.1.03-.21.03-.32c0-.41-.17-.79-.44-1.06L14.17 1L7.59 7.58C7.22 7.95 7 8.45 7 9v10a2 2 0 0 0 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73zM1 21h4V9H1z" />
                            </svg>
                            <h1 class="text-sm font-normal">95%</h1> {{-- Placeholder, bisa diganti dinamis --}}
                        </div>
                    </div>
                    <h1 class="font-bold text-xl tracking-wider py-1">
                        Rp{{ number_format($dokter->price, 0, ',', '.') }}
                    </h1>
                </div>
                @include('components.modalform')
            </div>
        </div>
        @empty
        <p class="text-gray-500">Tidak ada dokter tersedia untuk spesialisasi ini.</p>
        @endforelse
    </div>

</div>

@endsection