@extends('layouts.app')

@section('title', 'Pengelolaan Jadwal')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
    <div>
        <h1 class="font-display text-3xl font-bold mb-1">Daftar Kucing</h1>
        <p class="text-gray-500">Kelola dan pantau porsi makan.</p>
    </div>

    <div class="mt-4 md:mt-0 flex space-x-3">
        <button class="bg-pawOrange text-white font-bold px-4 py-2 rounded-xl shadow-sm hover:bg-orange-600 transition flex items-center">
            <i class="fa-solid fa-plus mr-2"></i> Tambah Kucing
        </button>
    </div>
</div>

<div class="bg-white p-2 rounded-2xl shadow-sm border border-gray-100 flex flex-wrap gap-2 mb-8">
    <button onclick="filterCat('Semua')" class="px-4 py-2 rounded-xl text-sm font-bold bg-pawBlue text-white filter-btn transition">Semua</button>
    <button onclick="filterCat('Belum Makan')" class="px-4 py-2 rounded-xl text-sm font-bold text-gray-500 hover:bg-gray-50 filter-btn transition">Belum Makan</button>
    <button onclick="filterCat('Sudah Makan')" class="px-4 py-2 rounded-xl text-sm font-bold text-gray-500 hover:bg-gray-50 filter-btn transition">Sudah Makan</button>
    <button onclick="filterCat('Terjadwal')" class="px-4 py-2 rounded-xl text-sm font-bold text-gray-500 hover:bg-gray-50 filter-btn transition">Terjadwal</button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="cat-container">
    @foreach($daftar_kucing as $kucing)
        <div class="cat-card bg-white rounded-3xl p-6 shadow-sm border-2 border-transparent hover:border-pawOrange transition duration-300 relative overflow-hidden group flex flex-col" data-status="{{ $kucing['status'] }}">

            <div class="absolute -right-10 -top-10 w-32 h-32 bg-orange-50 rounded-full opacity-0 group-hover:opacity-100 transition duration-500"></div>

            <div class="relative z-10 flex-grow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h3 class="font-display text-2xl font-bold text-pawDarkBlue">{{ $kucing['nama'] }}</h3>
                        <p class="text-xs text-gray-500 font-bold mt-1"><i class="fa-solid fa-heart text-pawOrange mr-1"></i> Mood: {{ $kucing['mood'] }}</p>
                    </div>

                    @if($kucing['status'] == 'Sudah Makan')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-lg text-xs font-bold border border-green-200"><i class="fa-solid fa-check mr-1"></i> Sudah</span>
                    @elseif($kucing['status'] == 'Belum Makan')
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-lg text-xs font-bold border border-red-200 animate-pulse"><i class="fa-solid fa-clock mr-1"></i> Belum</span>
                    @else
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-lg text-xs font-bold border border-yellow-200"><i class="fa-solid fa-calendar mr-1"></i> Terjadwal</span>
                    @endif
                </div>

                <div class="space-y-3 bg-pawLight p-4 rounded-2xl mt-4">
                    <div class="flex justify-between border-b border-gray-200 pb-2">
                        <span class="text-sm text-gray-500"><i class="fa-regular fa-clock mr-1"></i> Jam Makan</span>
                        <span class="text-sm font-bold text-pawBlue">{{ $kucing['jam_makan'] }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-200 pb-2">
                        <span class="text-sm text-gray-500"><i class="fa-solid fa-bowl-food mr-1"></i> Menu</span>
                        <span class="text-sm font-bold text-pawDarkBlue">{{ $kucing['makanan'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500"><i class="fa-solid fa-weight-scale mr-1"></i> Porsi</span>
                        <span class="text-sm font-bold text-pawDarkBlue">{{ $kucing['porsi'] }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-4 flex space-x-2 relative z-10 pt-4 border-t border-gray-50">
                <button class="flex-1 bg-blue-50 text-pawBlue font-bold py-2 rounded-xl text-sm hover:bg-blue-100 transition"><i class="fa-solid fa-pen text-xs mr-1"></i> Edit</button>
                <button class="bg-red-50 text-red-500 font-bold py-2 px-4 rounded-xl text-sm hover:bg-red-100 transition"><i class="fa-solid fa-trash"></i></button>
            </div>
        </div>
    @endforeach
</div>

<script>
    function filterCat(status) {
        document.querySelectorAll('.filter-btn').forEach(btn => {
            if(btn.innerText === status || (btn.innerText === 'Semua' && status === 'Semua')) {
                btn.className = 'px-4 py-2 rounded-xl text-sm font-bold bg-pawBlue text-white filter-btn transition';
            } else {
                btn.className = 'px-4 py-2 rounded-xl text-sm font-bold text-gray-500 hover:bg-gray-50 filter-btn transition';
            }
        });

        document.querySelectorAll('.cat-card').forEach(card => {
            if(status === 'Semua' || card.getAttribute('data-status') === status) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endsection
