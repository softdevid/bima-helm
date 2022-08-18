<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Image;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['category'];

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
            $filters['sortby'] ?? false,
            fn ($query, $sortby) =>
            $query->where(
                fn ($query) =>
                $query->orderBy('price', $sortby)
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
        return $this->hasMany(Image::class);
    }

    public function laporan()
    {
        return $this->hasOne(laporan::class);
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
