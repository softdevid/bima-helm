<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['product_id', 'size_id', 'size_name', 'merk_id', 'qty'];
    protected $with = ['product'];

    public function sizeName()
    {
        return $this->belongsTo(SizeName::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
