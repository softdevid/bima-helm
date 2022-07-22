<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['xs', 's', 'm', 'lg', 'xl', 'xxl'];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
