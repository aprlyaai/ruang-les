<?php

namespace App\Models\Dukungan;

/**
 * Menjaga kompatibilitas tampilan lama yang masih membaca properti "id"
 * setelah primary key diselaraskan dengan Class Diagram.
 */
trait MemilikiKunciUtamaRancangan
{
    public function getIdAttribute(): mixed
    {
        return $this->getAttribute($this->getKeyName());
    }
}
