<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['img_dt_1', 'img_dt_2', 'img_dt_3', 'img_dt_4'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
