<?php

namespace App\Models;
use App\Models\Kelaser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswar extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    

    public function kelaser()
    {
        return $this->belongsTo(Kelaser::class);
    }

    public function absensir()
    {
        return $this->hasMany(Absensir::class);
    }
}
