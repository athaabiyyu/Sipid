<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuktiLaporan extends Model
{
    use HasFactory;

    protected $table = 'bukti_laporans';
    protected $primaryKey = 'bukti_laporan_id';

    protected $guarded = ['bukti_laporan_id'];

    public function laporan(): BelongsTo {
        return $this->belongsTo(LaporanModel::class, 'laporan_id', 'laporan_id');
    }
}
