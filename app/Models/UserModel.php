<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 's_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'user_nik', 'user_password', 'user_nama', 'user_foto'];

    public function level(): BelongsTo {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function laporan(): HasMany {
        return $this->hasMany(LaporanModel::class, 'user_id', 'user_id');
    }
}
