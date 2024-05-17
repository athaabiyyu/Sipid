<?php

namespace App\Models;

use App\Models\KriteriaModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatrikModel extends Model
{
    use HasFactory;

    protected $table = 's_matrik';
    protected $primaryKey = 'matrik_id';
    protected $fillable = [
        'laporan_id',
        'kriteria_id',
        'matrik_nilai'
    ];

    public function laporan(): BelongsTo {
        return $this->belongsTo(LaporanModel::class, 'laporan_id', 'laporan_id');
    }

    public function kriteria(): BelongsTo {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }
}
