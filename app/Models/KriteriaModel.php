<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KriteriaModel extends Model
{
    use HasFactory;

    protected $table = 's_kriteria';
    protected $primaryKey = 'kriteria_id';
    protected $guarded = ['kriteria_id'];

    public function matrik(): HasMany {
        return $this->hasMany(MatrikModel::class, 'kriteria_id', 'kriteria_id');
    }
    public function penilaian(): HasMany {
        return $this->hasMany(PenilaianKriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }
}
