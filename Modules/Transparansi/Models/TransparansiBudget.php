<?php

namespace Modules\Transparansi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransparansiBudget extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transparansi_budgets';

    protected $fillable = [
        'year',
        'type', // PENDAPATAN, BELANJA, PEMBIAYAAN
        'category', // e.g. Pendapatan Asli Desa
        'title', // Uraian
        'slug',
        'budget', // Anggaran
        'realization', // Realisasi
        'description',
        'order',
        'is_active',
        // SEO (Optional but good to keep)
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'year' => 'integer',
            'budget' => 'integer', // or decimal/bigint depending on DB, casts to int usually fine for IDR
            'realization' => 'integer',
            'order' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByYear($query, int $year)
    {
        return $query->where('year', $year);
    }

    protected static function newFactory()
    {
        // return \Modules\Transparansi\Database\Factories\TransparansiBudgetFactory::new();
        return null;
    }
}
