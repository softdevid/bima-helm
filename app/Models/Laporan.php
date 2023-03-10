<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['product_id', 'size_id', 'size_name_id', 'merk_id', 'qty', 'profit'];
    protected $with = ['product', 'sizeName', 'merk'];

    public function sizeName()
    {
        return $this->belongsTo(SizeName::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function merk()
    {
        return $this->belongsTo(Product::class);
    }
}
