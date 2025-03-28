@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-gray-900 backdrop-blur-md p-8 rounded-xl shadow-lg w-full max-w-2xl border border-white/20">
        <h1 class="text-3xl font-semibold mb-4 animate-fade-in text-white">🚀 Selamat Datang!</h1>
        <p class="text-lg text-gray-200">
            Halo!, <span class="font-bold hidden">{{ auth()->user()->name ?? 'Pengguna' }}!</span>  
            <br>Selamat datang di <span class="font-bold">Phistrap</span>. Kami senang Anda bergabung dengan kami.
        </p>
    </div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 1s ease-in-out;
    }
</style>
@endsection
