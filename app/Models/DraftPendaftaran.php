<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftPendaftaran extends Model
{
    use MemilikiKunciUtamaRancangan, HasFactory;

    protected $table = 'draft_pendaftaran';
    protected $primaryKey = 'draft_id';

    protected $fillable = ['user_id', 'current_step', 'draft_data'];

    protected $casts = [
        'draft_data' => 'array',
    ];
}
