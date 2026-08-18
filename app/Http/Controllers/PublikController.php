<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Testimoni;
use App\Models\Faq;
use App\Models\Pengaturan;
use App\Models\Keunggulan;

class PublikController extends Controller
{
    public function index()
    {
        $packages = \Illuminate\Support\Facades\Cache::remember('public.packages', 3600, function () {
            return Program::where('status_program', true)->orderBy('urutan', 'asc')->get();
        });

        $groupedPackages = $packages->groupBy(function($item) {
            return $item->nama_program . '_' . $item->kelas_program;
        });

        $testimonials = \Illuminate\Support\Facades\Cache::remember('public.testimonials', 3600, function () {
            return Testimoni::where('status_testimoni', true)->orderBy('urutan', 'asc')->get();
        });

        $faqs = \Illuminate\Support\Facades\Cache::remember('public.faqs', 3600, function () {
            return Faq::where('status_faq', true)->orderBy('urutan')->get();
        });

        $settings = \Illuminate\Support\Facades\Cache::remember('public.settings', 3600, function () {
            return Pengaturan::pluck('value', 'key');
        });

        $features = \Illuminate\Support\Facades\Cache::remember('public.features', 3600, function () {
            return Keunggulan::where('status_keunggulan', true)->orderBy('urutan')->get();
        });

        // Proses Hero Lines di Controller (MVC)
        $rawHeadline = $settings['hero_headline'] ?? "Tingkatkan Prestasi Anak\nBersama Ruang Les";
        $heroLines = explode("\n", str_replace("\r", "", $rawHeadline));
        $firstLine = $heroLines[0] ?? '';
        $secondLine = isset($heroLines[1]) ? implode("\n", array_slice($heroLines, 1)) : '';

        return view('publik.beranda', compact(
            'packages',
            'groupedPackages',
            'testimonials',
            'faqs',
            'settings',
            'features',
            'firstLine',
            'secondLine'
        ));
    }

    public function tentangKami()
    {
        $settings = \Illuminate\Support\Facades\Cache::remember('public.settings', 3600, function () {
            return Pengaturan::pluck('value', 'key');
        });

        $galleries = \Illuminate\Support\Facades\Cache::remember('public.galleries', 3600, function () {
            return \App\Models\Galeri::where('status_galeri', true)->orderBy('urutan')->get();
        });

        return view('publik.tentang-kami', compact('settings', 'galleries'));
    }
}
