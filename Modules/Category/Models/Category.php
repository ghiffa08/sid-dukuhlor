<?php

namespace Modules\Category\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Enums\CategoryStatus;

class Category extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'order',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'group_name'
    ];

    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'status' => CategoryStatus::class,
            'order' => 'integer',
        ]);
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status', CategoryStatus::Active->value);
    }

    public function posts()
    {
        return $this->hasMany('Modules\Post\Models\Post');
    }

    protected static function newFactory()
    {
        return \Modules\Category\database\factories\CategoryFactory::new();
    }
}
