<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeName extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function laporan()
    {
        return $this->hasOne(laporan::class);
    }
}
