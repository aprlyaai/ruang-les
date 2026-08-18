<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Murid;

class GantiMuridController extends Controller
{
    public function switchSiswa(Request $request)
    {
        $request->validate([
            'murid_id' => 'required|integer',
        ]);

        $siswaId = $request->input('murid_id');

        // Validasi kepemilikan: pastikan murid_id milik user yang sedang login
        $exists = Murid::where('murid_id', $siswaId)
            ->where('orangtua_id', Auth::user()->orangtua_id)
            ->exists();

        if ($exists) {
            session(['active_student_id' => $siswaId]);
        }

        return back();
    }
}
