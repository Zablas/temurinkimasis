<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siuloma extends Model
{
    use HasFactory;
    protected $fillable = ['pavadinimas', 'aprasas', 'stud_limitas'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
