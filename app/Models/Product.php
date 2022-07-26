<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    // choose $guarded or $fillable,
    // $guarded is only for unfillable columns
    // but $fillable is only for fillable colums

    protected $guarded = ['id'];
    protected $with = ['category'];
    // protected $primaryKey = ['id'];
    // protected $fillable = ['category_id', 'name', 'slug', 'merk', 'price', 'stock', 'image_id', 'size_id'];
    // protected $attributes = [
    //     'delayed' => false,
    // ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('name', 'like', '%' . $search . '%')
            )
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}
