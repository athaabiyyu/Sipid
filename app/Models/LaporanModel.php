<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanModel extends Model
{
    use HasFactory;

    protected $table = 's_laporan';
    protected $primaryKey = 'laporan_id';

    protected $fillable = ['user_id', 'infrastruktur_id', 'status_id', 'tgl_laporan', 'bukti_laporan', 'deskripsi_laporan'];

    public function user(): BelongsTo {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
    public function infrastruktur(): BelongsTo {
        return $this->belongsTo(InfrastrukturModel::class, 'infrastruktur_id', 'infrastruktur_id');
    }
    public function status(): BelongsTo {
        return $this->belongsTo(StatusLaporanModel::class, 'status_id', 'status_id');
    }
}
