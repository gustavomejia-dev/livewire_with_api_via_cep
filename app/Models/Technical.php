<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'setor',
        'technical_email',
        
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
