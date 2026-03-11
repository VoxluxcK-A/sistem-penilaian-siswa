<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nis', 'nama', 'perilaku'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'nis', 'nis');
    }

    public function getRataRataNilaiAttribute()
    {
        return $this->nilai()->avg('nilai') ?? 0;
    }

    public function getStatusKelulusanAttribute()
    {
        $rataRata = $this->rata_rata_nilai;
        return $rataRata >= 79 ? 'LULUS' : 'TIDAK LULUS';
    }
}
