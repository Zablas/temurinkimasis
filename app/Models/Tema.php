<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    protected $fillable = ['pavadinimas', 'aprasas'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
