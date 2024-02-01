<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Absensir extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kelaser()
    {
        return $this->belongsTo(Kelaser::class);
    }

    public function siswar()
    {
        return $this->belongsTo(Siswar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    } 
}