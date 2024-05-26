<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenilaianKriteriaModel extends Model
{
    use HasFactory;

    protected $table = 's_penilaian_kriteria';
    protected $primaryKey = 'penilaian_kriteria_id';
    protected $guarded = ['penilaian_kriteria_id'];

    public function kriteria(): BelongsTo {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }
}
