<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';

    protected $fillable = [
        'nama_kegiatan', 'tanggal_kegiatan', 'deskripsi_kegiatan', 'id_masjid','waktu_kegiatan',
    ];
}
