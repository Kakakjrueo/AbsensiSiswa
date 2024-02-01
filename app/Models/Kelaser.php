<?php

namespace App\Models;

use App\Models\Siswar;
use App\Models\Absensir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelaser extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function siswar()
    {
        return $this->hasMany(Siswar::class);
    }

    public function absensir()
    {
        return $this->hasMany(Absensir::class);
    }
}
