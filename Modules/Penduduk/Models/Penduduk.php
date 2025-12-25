<?php

namespace Modules\Penduduk\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penduduk extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'penduduk';

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan_kk',
        'pendidikan_sedang',
        'pekerjaan',
        'status_kawin',
        'status_penduduk',
        'alamat',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Penduduk\database\factories\PendudukFactory::new();
    }
}
