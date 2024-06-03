<?php

namespace App\Models;

use App\Models\UserModel;
use App\Models\MatrikModel;
use App\Models\InfrastrukturModel;
use App\Models\StatusLaporanModel;
use App\Models\LokasiPelaporanModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LaporanModel extends Model
{
    use HasFactory;

    protected $table = 's_laporan';
    protected $primaryKey = 'laporan_id';

    protected $guarded = ['laporan_id'];

    public function user(): BelongsTo {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
    public function infrastruktur(): BelongsTo {
        return $this->belongsTo(InfrastrukturModel::class, 'infrastruktur_id', 'infrastruktur_id');
    }
    public function status(): BelongsTo {
        return $this->belongsTo(StatusLaporanModel::class, 'status_id', 'status_id');
    }
    public function matrik():HasMany {
        return $this->hasMany(MatrikModel::class, 'laporan_id', 'laporan_id');
    }
    public function buktiLaporan() {
        return $this->hasMany(BuktiLaporan::class, 'laporan_id', 'laporan_id');
    }


    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('status')) {
                $model->status_updated_at = now();
            }
        });
    }
}
