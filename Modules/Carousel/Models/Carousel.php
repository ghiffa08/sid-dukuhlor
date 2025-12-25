<?php

namespace Modules\Carousel\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Carousel\Database\Factories\CarouselFactory;

class Carousel extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'carousels';

    protected $fillable = [
        'title',
        'description',
        'featured_image',
        'link',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('order');
    }

    protected static function newFactory()
    {
        return CarouselFactory::new();
    }
}
