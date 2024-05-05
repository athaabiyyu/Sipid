<?php

namespace App\Models;

use App\Models\InfrastrukturModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LokasiPelaporanModel extends Model
{
    use HasFactory;

    protected $table = 's_lokasi_pelaporan';
    protected $primaryKey = 'lokasi_id';
    protected $guarded = ['lokasi_laporan_id'];

    public function infrastruktur(): HasMany {
        return $this->hasMany(InfrastrukturModel::class, 'lokasi_laporan_id', 'lokasi_laporan_id');
    }

    public function laporan(): HasMany {
        return $this->hasMany(LaporanModel::class, 'lokasi_laporan_id', 'lokasi_laporan_id');
    }
}
