@extends('layouts.orang-tua')

@section('title', 'Layanan & Bantuan')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden text-center p-12">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-primary-50 text-primary mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-2">Layanan & Bantuan</h3>
        <p class="text-gray-600">Halaman ini sedang dalam tahap pengembangan dan akan segera hadir pada pembaruan sistem berikutnya.</p>
        <div class="mt-8">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-primary-700 bg-primary-100 hover:bg-primary-200 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
