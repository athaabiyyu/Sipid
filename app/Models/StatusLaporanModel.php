<?php

namespace App\Models;

use App\Models\LaporanModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusLaporanModel extends Model
{
    use HasFactory;

    protected $table = 's_status_laporan';
    protected $primaryKey = 'status_id';

    protected $fillable = ['status_kode', 'status_nama'];

    public function laporan(): HasMany {
        return $this->hasMany(LaporanModel::class, 'status_id', 'status_id');
    }
}
