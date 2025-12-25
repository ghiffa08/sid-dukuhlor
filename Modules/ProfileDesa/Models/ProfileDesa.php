<?php

namespace Modules\ProfileDesa\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileDesa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'profile_desa';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'order',
        'is_active',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
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

    protected static function newFactory()
    {
        return \Modules\ProfileDesa\Database\Factories\ProfileDesaFactory::new();
    }
}
