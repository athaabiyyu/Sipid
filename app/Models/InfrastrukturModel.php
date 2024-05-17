<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InfrastrukturModel extends Model
{
    use HasFactory;

    protected $table = 's_infrastruktur';
    protected $primaryKey = 'infrastruktur_id';

    protected $fillable = ['infrastruktur_kode', 'infrastruktur_nama', 'lokasi_laporan_id'];

    public function laporan(): HasMany {
        return $this->hasMany(LaporanModel::class, 'infrastruktur_id', 'infrastruktur_id');
    }

    // public function lokasi(): BelongsTo {
    //     return $this->belongsTo(LokasiPelaporanModel::class, 'lokasi_laporan_id', 'lokasi_laporan_id');
    // }    
}
