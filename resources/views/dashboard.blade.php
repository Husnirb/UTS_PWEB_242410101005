@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="font-display text-4xl font-bold mb-2">Halo, <span class="text-pawOrange">{{ $username }}</span>!</h1>
    <p class="text-gray-500 text-lg">Bagaimana kabar anabul hari ini? Yuk cek jadwal makannya.</p>
</div>

<div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 mb-8 relative overflow-hidden">
    <div class="flex justify-between items-end mb-4">
        <div>
            <h3 class="font-bold text-xl">Progress Makan Hari Ini</h3>
            <p class="text-sm text-gray-500">{{ $sudah_makan }} dari {{ count($kucing) }} kucing sudah makan.</p>
        </div>
        <span class="text-3xl font-display font-bold text-pawBlue" id="progress-text">0%</span>
    </div>

    <div class="w-full bg-blue-50 rounded-full h-6 border border-blue-100 p-1">
        <div id="progress-bar" class="bg-pawBlue h-full rounded-full w-0 transition-all duration-[1500ms] ease-out flex justify-end items-center pr-3">
            <i class="fa-solid fa-fish text-white text-xs"></i>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-pawOrange rounded-3xl p-6 text-white shadow-lg transform hover:scale-[1.02] transition">
        <div class="flex items-center mb-2">
            <i class="fa-solid fa-bell text-2xl mr-2"></i>
            <h3 class="font-display text-2xl font-bold">Penting!</h3>
        </div>
        <p class="text-orange-100 mb-5">Waktunya memberikan snack sore untuk Milo pada pukul 16:00.</p>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="inline-block bg-white text-pawOrange font-bold px-4 py-2 rounded-xl text-sm hover:bg-orange-50 transition">Lihat Semua Jadwal <i class="fa-solid fa-chevron-right ml-1 text-xs"></i></a>
    </div>

    <div>
        @include('components.cat-tip')
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const targetProgress = parseInt("{{ $progress }}") || 0;

        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');

        setTimeout(() => {
            progressBar.style.width = targetProgress + '%';

            let current = 0;
            const interval = setInterval(() => {
                if(current >= targetProgress) {
                    clearInterval(interval);
                    progressText.innerText = targetProgress + '%';
                } else {
                    current++;
                    progressText.innerText = current + '%';
                }
            }, 20);
        }, 300);
    });
</script>
@endsection
