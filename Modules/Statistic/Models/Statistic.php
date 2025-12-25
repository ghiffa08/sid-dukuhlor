<?php

namespace Modules\Statistic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statistic extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'statistics';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'value',
        'unit',
        'icon',
        'color',
        'description',
        'order',
        'is_active',
        'featured_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'value' => 'integer',
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

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    protected static function newFactory()
    {
        return \Modules\Statistic\Database\Factories\StatisticFactory::new();
    }
}
