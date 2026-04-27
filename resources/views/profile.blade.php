@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-3xl mx-auto mt-4">
    <div class="bg-white rounded-[2rem] shadow-lg overflow-hidden flex flex-col md:flex-row border border-gray-100">

        <div class="bg-pawBlue text-white p-8 md:w-2/5 flex flex-col items-center justify-center relative overflow-hidden">
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-blue-600 rounded-full opacity-50"></div>

            <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center text-5xl shadow-xl relative z-10 mb-4 border-4 border-pawOrange text-pawBlue">
                <i class="fa-solid fa-user"></i>
            </div>

            <h2 class="font-display text-2xl font-bold relative z-10">{{ $username }}</h2>
            <p class="text-blue-200 text-sm font-bold mt-1 relative z-10 bg-blue-800 px-3 py-1 rounded-full">{{ $profil['role'] }}</p>
        </div>

        <div class="p-8 md:w-3/5">
            <div class="inline-block bg-orange-100 text-pawOrange px-4 py-2 rounded-full text-sm font-bold mb-6">
                <i class="fa-solid fa-award mr-1"></i> Status: {{ $profil['level'] }}
            </div>

            <h3 class="font-bold text-xl mb-2 text-pawDarkBlue">Tentang Pemilik</h3>
            <p class="text-gray-500 mb-6 leading-relaxed">{{ $profil['deskripsi'] }}</p>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-pawLight p-4 rounded-2xl border border-gray-100">
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Total Kucing</p>
                    <p class="font-bold text-xl text-pawDarkBlue"><i class="fa-solid fa-cat text-pawOrange mr-2"></i>{{ $profil['total_kucing'] }} Ekor</p>
                </div>
                <div class="bg-pawLight p-4 rounded-2xl border border-gray-100">
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Bergabung Sejak</p>
                    <p class="font-bold text-xl text-pawDarkBlue"><i class="fa-regular fa-calendar-check text-pawOrange mr-2"></i>{{ $profil['bergabung'] }}</p>
                </div>
            </div>

            <button class="w-full bg-gray-50 text-gray-600 font-bold py-3 rounded-xl border border-gray-200 hover:bg-gray-100 transition">
                <i class="fa-solid fa-pen-to-square mr-2"></i> Edit Profil
            </button>
        </div>

    </div>
</div>
@endsection
