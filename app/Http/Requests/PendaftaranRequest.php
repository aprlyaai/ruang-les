<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\DraftPendaftaran;
use App\Models\JadwalKelas;

class PendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role === 'orang_tua';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $action = $this->input('action');
        if ($action === 'back' || (is_string($action) && str_starts_with($action, 'jump_'))) {
            return [];
        }

        $user = Auth::user();
        $draft = DraftPendaftaran::where('user_id', $user->id)->first();
        $step = $draft ? $draft->current_step : 1;

        if ($step == 1) {
            return [
                'nama_murid' => 'required|string|max:255',
                'panggilan_murid' => 'required|string|max:255',
                'tempat_lahir_murid' => 'required|string|max:255',
                'tanggal_lahir_murid' => 'required|date',
                'jenis_kelamin_murid' => 'required|in:Laki-laki,Perempuan',
                'agama' => 'required|string|max:255',
            ];
        } elseif ($step == 2) {
            return [
                'sekolah' => 'required|string|max:255',
                'kelas' => 'required|string|max:50',
                'nilai_rata_rata' => 'nullable|numeric',
                'mapel_ditingkatkan' => 'required|string|max:255',
                'mapel_sulit' => 'required|string|max:255',
                'karakteristik_anak' => 'required|string',
            ];
        } elseif ($step == 3) {
            return [
                'nama_ortu' => 'required|string|max:255',
                'status_hubungan' => 'required|string|max:255',
                'nomor_telepon' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'alamat_domisili' => 'required|string',
            ];
        } elseif ($step == 4) {
            return [
                'program_id' => 'required|exists:program,program_id',
            ];
        } elseif ($step == 5) {
            return [
                'jadwal_1_id' => 'required|exists:jadwal_kelas,jadwal_id',
                'jadwal_2_id' => 'required|exists:jadwal_kelas,jadwal_id|different:jadwal_1_id',
            ];
        } elseif ($step == 6) {
            return [
                'persetujuan' => 'required|accepted',
            ];
        } elseif ($step == 7) {
            return [
                'bukti_bayar' => 'required|file|mimes:jpg,jpeg,png,webp,pdf|max:2048',
            ];
        }

        return [];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            // Step 1
            'nama_murid.required' => 'Nama lengkap wajib diisi.',
            'panggilan_murid.required' => 'Nama panggilan wajib diisi.',
            'tempat_lahir_murid.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir_murid.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir_murid.date' => 'Format tanggal lahir tidak valid.',
            'jenis_kelamin_murid.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin_murid.in' => 'Pilihan jenis kelamin tidak valid.',
            'agama.required' => 'Agama wajib dipilih.',

            // Step 2
            'sekolah.required' => 'Asal sekolah wajib diisi.',
            'kelas.required' => 'Kelas saat ini wajib dipilih.',
            'nilai_rata_rata.numeric' => 'Nilai rata-rata harus berupa angka.',
            'mapel_ditingkatkan.required' => 'Mata pelajaran yang ingin ditingkatkan wajib diisi.',
            'mapel_sulit.required' => 'Mata pelajaran yang dirasa sulit wajib diisi.',
            'karakteristik_anak.required' => 'Karakteristik anak wajib diisi.',

            // Step 3
            'nama_ortu.required' => 'Nama orang tua/wali wajib diisi.',
            'status_hubungan.required' => 'Status hubungan wajib dipilih.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'alamat_domisili.required' => 'Alamat domisili wajib diisi.',

            // Step 4
            'program_id.required' => 'Paket bimbingan wajib dipilih.',
            'program_id.exists' => 'Paket bimbingan yang dipilih tidak valid.',

            // Step 5
            'jadwal_1_id.required' => 'Jadwal pertemuan pertama wajib dipilih.',
            'jadwal_1_id.exists' => 'Jadwal pertemuan pertama tidak valid.',
            'jadwal_2_id.required' => 'Jadwal pertemuan kedua wajib dipilih.',
            'jadwal_2_id.exists' => 'Jadwal pertemuan kedua tidak valid.',
            'jadwal_2_id.different' => 'Jadwal pertemuan kedua tidak boleh sama dengan pertemuan pertama.',

            // Step 6
            'persetujuan.required' => 'Anda harus menyetujui pernyataan kebenaran data.',
            'persetujuan.accepted' => 'Anda harus menyetujui pernyataan kebenaran data.',

            // Step 7
            'bukti_bayar.required' => 'Bukti pembayaran wajib diunggah.',
            'bukti_bayar.file' => 'Bukti pembayaran harus berupa file.',
            'bukti_bayar.mimes' => 'Bukti pembayaran harus berformat JPEG, PNG, atau PDF.',
            'bukti_bayar.max' => 'Ukuran file bukti pembayaran maksimal 2MB.',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $action = $this->input('action');
        if ($action === 'back' || (is_string($action) && str_starts_with($action, 'jump_'))) {
            return;
        }

        $user = Auth::user();
        $draft = DraftPendaftaran::where('user_id', $user->id)->first();
        $step = $draft ? $draft->current_step : 1;

        if ($step == 5) {
            $validator->after(function ($validator) {
                if ($this->jadwal_1_id) {
                    $schedule1 = JadwalKelas::with('package')->find($this->jadwal_1_id);
                    if ($schedule1 && ($schedule1->jumlah_murid >= $schedule1->package->max_murid)) {
                        $validator->errors()->add('jadwal_1_id', 'Kuota untuk Jadwal Pertemuan 1 sudah penuh.');
                    }
                }
                if ($this->jadwal_2_id) {
                    $schedule2 = JadwalKelas::with('package')->find($this->jadwal_2_id);
                    if ($schedule2 && ($schedule2->jumlah_murid >= $schedule2->package->max_murid)) {
                        $validator->errors()->add('jadwal_2_id', 'Kuota untuk Jadwal Pertemuan 2 sudah penuh.');
                    }
                }
            });
        }
    }
}
