<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 's_user';
    protected $primaryKey = 'user_id';
    protected $guarded = ['user_id'];

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function laporan(): HasMany
    {
        return $this->hasMany(LaporanModel::class, 'user_id', 'user_id');
    }
}
